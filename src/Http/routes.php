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

    Route::name('users')->get('/users', 'UserPageController@index');
    Route::post('/user/{user}/roles', 'UserPageController@userUpdateRoles');
    Route::name('user_roles')->get('/user/{user}/roles', 'UserPageController@userShowRoles');

    Route::name('roles')->get('/roles', 'UserPageController@roles');

    Route::name('role')->post('/role', 'UserPageController@storeRole');
    Route::put('/role', 'UserPageController@updateRole');

    Route::name('role_permissions')->get('/role/{role}/permissions', 'UserPageController@showRolePermissions');
    Route::post('/role/{role}/permissions', 'UserPageController@updateRolePermissions');

    Route::name('permissions')->get('/permissions', 'UserPageController@permissions');
    Route::name('permission')->post('/permission', 'UserPageController@storePermission');
    Route::put('/permission', 'UserPageController@updatePermission');

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