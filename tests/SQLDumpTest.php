<?php

namespace Tecdiary\LaravelSqlDump\Tests;

class SQLDumpTest extends TestCase
{
    public static function tearDownAfterClass(): void
    {
        unlink(dirname(__FILE__) . '/database/database.sql');
    }

    public function testDumpCommadIsWorkingFine()
    {
        $this->artisan('migrate:dump --path=' . dirname(__FILE__) . '/database/migrations')
            ->assertExitCode(0);
    }

    public function testFormatOption()
    {
        $this->artisan('migrate:dump --format --path=' . dirname(__FILE__) . '/database/migrations')
            ->assertExitCode(0);
        $database = file_get_contents(dirname(__FILE__) . '/database/database.sql');
        $expected = file_get_contents(dirname(__FILE__) . '/database/formatted.sql');
        $this->assertEquals($expected, $database);
    }

    public function testNonFormatted()
    {
        $this->artisan('migrate:dump --path=' . dirname(__FILE__) . '/database/migrations')
            ->assertExitCode(0);

        $database = file_get_contents(dirname(__FILE__) . '/database/database.sql');
        $expected = file_get_contents(dirname(__FILE__) . '/database/expected.sql');
        $this->assertEquals($expected, $database);
    }
}
