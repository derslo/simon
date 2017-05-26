<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    App\Models\Os::class,
    function (Faker\Generator $faker) {
        return [
            'name' => $faker->linuxPlatformToken,
        ];
    }
);