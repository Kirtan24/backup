<?php

namespace Kirtan\Backup;

use Illuminate\Support\ServiceProvider;
use Kirtan\Backup\Console\dbBackup;

class ContectServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/views','contect');

        $this->publishes([
            __DIR__.'/config/backup.php' => config_path('backup.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/config/backup.php', 'backup'
        );

        if($this->app->runningInConsole()) {
            $this->commands([
                dbBackup::class,
            ]);
        }        
    }

    public function register(){

    }
}