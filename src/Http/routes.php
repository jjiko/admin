<?php
Route::group(['prefix' => 'admin'], function(){

  Route::post('page', function() {
    // @todo insert page
  });

  Route::put('page/{id}', function() {
    // @todo update page
  });

  Route::group(['namespace' => 'Jiko\Admin\Http\Controllers'], function () {
    // @todo
    Route::get('/', ['uses' => 'AdminPageController@index', 'as' => 'admin_home']);
    Route::get('gaming', ['uses' => 'AdminPageController@gaming']);
    Route::get('photos', function() {
      $client = new Larabros\Elogram\Client(
        getenv('INSTAGRAM_CLIENT_ID'),
        getenv('INSTAGRAM_CLIENT_SECRET'),
        null,
        getenv('INSTAGRAM_REDIRECT_URI')
      );
      if(!Input::has('code')) {
        return redirect($client->getLoginUrl());
      }

      return $client->getAccessToken(Input::get('code'));
    });
    Route::get('upload', ['uses' => 'AdminPageController@getFile']);
    Route::post('upload', ['uses' => 'AdminPageController@storeFile']);
  });

  Route::get('sync/wishlist', function(){
    return Response::json([]);
  });

  Route::get('xbx/bestiary-materials', 'Jiko\XBXDB\Admin\Http\Controllers\AdminPageController@bestiaryMaterials');
});