<?php

namespace Tecdiary\LaravelSqlDump\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Tecdiary\LaravelSqlDump\Formatter\SqlFormatter;

class LaravelSqlDumpCommand extends Command
{
    public $description = 'Dump Laravel Migrations to SQL File';

    public $signature = 'migrate:dump {--F|format : To format sql dump file} {--P|path= : Path to migration directory}';

    protected function stringifyQuery($query, $name, $format)
    {
        $comment = '';
        if (Str::startsWith($query['query'], 'create table')) {
            $comment .= "\n-- migration: " . $name . " --\n";
        }
        if (Str::startsWith($query['query'], 'alter table')) {
            $comment .= "\n";
        }
        if (Str::startsWith($query['query'], 'insert into')) {
            $comment .= "\n-- insert data -- \n";
            foreach ($query['bindings'] as $item) {
                $query['query'] = Str::replaceFirst('?', "'" . $item . "'", $query['query']);
            }
        }

        $query = $format ? $comment . SqlFormatter::format($query['query'], false) : $query['query'];
        return $query;
    }

    public function handle()
    {
        $migrator   = app('migrator');
        $dir_path   = $this->option('path') ? $this->option('path') : base_path('/database/migrations');
        $migrations = $migrator->getMigrationFiles($dir_path);
        $migrator->requireFiles($migrations);

        $this->comment("Generating SQL dump file from Laravel migrations.\n\n");
        $bar = $this->output->createProgressBar(count($migrations));
        $db  = $migrator->resolveConnection(null);
        $bar->start();

        $format = $this->option('format');
        $sql    = $format ? "-- Generating SQL dump file from Laravel migrations --\n" : '';

        foreach ($migrations as $migration) {
            $migration = $migrator->resolve($migrator->getMigrationName($migration));
            $queries   = $db->pretend(fn () => $migration->up());
            $name      = Str::snake(get_class($migration));
            foreach ($queries as $query) {
                $sql .= $this->stringifyQuery($query, $name, $format) . ";\n";
            }
            $bar->advance();
        }
        $dir = config('laravelsqldump.directory');
        if (is_dir($dir) === false) {
            mkdir($dir);
        }

        File::put($dir . '/database.sql', $sql);
        $bar->finish();
        $this->comment("\n\nLaravel SQL dump file had been successfully created.");
    }
}
