<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    App\Models\Storage::class,
    function (Faker\Generator $faker) {
        $faker = Faker\Factory::create('de_DE');

        return [
            'amount'     => $faker->numberBetween(1, 100),
            'unit'       => 'TB',
            'type'       => 'HD',
            'raid'       => $faker->boolean(),
            'raid_level' => $faker->randomDigit,
        ];
    }
);