<?php

namespace Jiko\Admin\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Jiko\Models\Twitter\TwitterRelationship;

class AdminPageController extends AdminController
{
  protected $layout = 'admin::layouts.default';

  public function index()
  {
    return $this->content('admin::index');
  }

  public function writeFileToDrive($filename, $contents)
  {
    $disk = Storage::disk('gcs');
    if (!$disk->has($filename)) {
      $disk->put(
        $filename,
        $contents,
        Filesystem::VISIBILITY_PUBLIC
      );
    }

    return $filename;
  }

  public function storeFilesAsync(Request $request)
  {

    //return response()->json(Input::get('files'));

    $mimes = new \Mimey\MimeTypes;

    $resp = [];
    foreach (Input::get('files') as $i => $file) {
      $data = array_get($file, "content");
      list(, $fileContent) = explode(',', $data);
      $fileContent = base64_decode(str_replace(' ', '+', $fileContent));

      $hash = hash("md5", $fileContent);
      $folder = substr($hash, 0, 2);
      $fileMimetype = array_get($file, 'type');
      $fileExtension = $mimes->getExtension($fileMimetype);
      $filename = "img/upload/$folder/$hash.{$fileExtension}";
      $resp[] = "https://cdn.joejiko.com/" . $this->writeFileToDrive($filename, $fileContent);
    }
    return response()->json($resp);
  }

  public function storeFile(Request $request)
  {
    $image = $request->image;
    $hash = hash("md5", file_get_contents($image->getRealPath()));
    $folder = substr($hash, 0, 2);
    $filename = "img/upload/$folder/$hash.{$image->getClientOriginalExtension()}";
    $disk = Storage::disk('gcs');
    if (!$disk->has($filename)) {
      $disk->put(
        $filename,
        file_get_contents($image->getRealPath()),
        Filesystem::VISIBILITY_PUBLIC
      );
    }

    if ($request->isJson()) {
      return response()->json(['filename' => $filename]);
    }

    return $this->content('admin::image', ["filename" => $filename]);
  }

  public function getFile()
  {
    return $this->content('admin::file');
  }

  public function pages()
  {
    $routeCollection = \Route::getRoutes();
    $this->setContent('admin::pages', ['pages' => $routeCollection]);
  }

  public function gaming()
  {
    return $this->content('admin::gaming');
  }

  public function croppie()
  {
    return $this->content('admin::croppie');
  }

  public function twitterWhitelist()
  {
    $result = TwitterRelationship::where('id', request()->input('id'))
      ->update([
        'whitelist' => (bool)request()->input('whitelist')
      ]);
    return $result;
  }

  public function twitter()
  {
    if (!auth()->user()->id === 2) return redirect('/admin');

    return $this->content('admin::twitter.following', [
      "following" => TwitterRelationship::where('following', 1)->where('followed_by', 0)->where('whitelist', 0)->orderBy('last_status_created_at', 'asc')->get(),
      'followingBack' => TwitterRelationship::where('following', 1)->where('followed_by', 1)->where('whitelist', 0)->orderBy('last_status_created_at', 'desc')->get(),
      'whitelist' => TwitterRelationship::where('whitelist', 1)->orderBy('last_status_created_at', 'desc')->get(),
      'trashed' => TwitterRelationship::withTrashed()->where('deleted_at', '<>', null)->get()
    ]);
  }

  public function google()
  {
    return view('admin::google.analytics');
  }

  public function nest()
  {
    $nestUser = auth()->user()->nest;
    if (!$nestUser) return redirect('/user');
    return $this->content('admin::nest.console', ['data' => $nestUser->data]);
  }

}
