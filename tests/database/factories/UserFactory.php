<?php

use Faker\Generator;

$factory->define('Tecdiary\LaravelSqlDump\Tests\User', function (Generator $faker) {
    return [
        'name'     => 'Test User',
        'email'    => 'test@test.com',
        'password' => 'testing',
    ];
});
