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
    Route::get('/', ['uses' => 'AdminPageController@index']);
  });

  Route::get('sync/wishlist', function(){
    return Response::json([]);
  });

  Route::get('xbx/bestiary-materials', 'Jiko\XBXDB\Admin\Http\Controllers\AdminPageController@bestiaryMaterials');
});