<?php

namespace Tecdiary\LaravelSqlDump;

use Illuminate\Support\ServiceProvider;
use Tecdiary\LaravelSqlDump\Commands\LaravelSqlDumpCommand;

class LaravelSqlDumpServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravelsqldump.php' => config_path('laravelsqldump.php'),
            ], 'config');

            $this->commands([
                LaravelSqlDumpCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravelsqldump.php', 'laravelsqldump');
    }
}
