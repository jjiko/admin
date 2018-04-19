<?php namespace Jiko\Admin;

class Facade extends \Illuminate\Support\Facades\Facade
{
  protected static function getFacadeAccessor()
  {
    return Admin::class;
  }
}