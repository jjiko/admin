<?php

namespace Jiko\Admin\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPageController extends AdminController
{
  protected $layout = 'admin::layouts.default';

  public function index(Request $request)
  {
    return $this->content('admin::index');
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
}
