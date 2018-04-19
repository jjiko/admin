<?php

return [
  /*
   |--------------------------------------------------------------------------
   | Admin UI Settings
   |--------------------------------------------------------------------------
   |
   | Admin UI is enabled by default, when debug is set to true in app.php.
   | You can override the value by setting enable to true or false instead of null.
   |
   | You can provide an array of URI's that must be ignored (eg. 'api/*')
   |
   */

  'enabled' => env('ADMINUI_ENABLED', env('APP_DEBUG', false)),
  'route_prefix' => 'admin',
  'route_domain' => null
];