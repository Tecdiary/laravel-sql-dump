<?php

namespace Tecdiary\LaravelSqlDump\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Tecdiary\LaravelSqlDump\LaravelSqlDumpServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__ . '/database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelSqlDumpServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        $app['config']->set('laravelsqldump.directory', './tests/database');
    }
}
