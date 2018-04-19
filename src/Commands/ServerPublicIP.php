<?php

namespace Jiko\Admin\Commands;

use Illuminate\Console\Command;
use Jiko\Api\ApiCache;

class ServerPublicIP extends Command
{
  protected $signature = 'server:public-ip {--store}';

  protected $description = 'get public ip of server';

  public function handle()
  {
    $ip = file_get_contents('https://api.ipify.org');
    if ($this->option('store') === true) {
      $stored = ApiCache::firstOrNew(['category' => 'Command', 'key' => 'public.ip']);
      $stored->data = $ip;
      $stored->save();
    }

    if (app()->runningInConsole()) {
      $this->info($ip);
    }
  }
}