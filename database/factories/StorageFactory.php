<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    \App\Models\StorageUnit::class,
    function (Faker\Generator $faker) {
        return [
            'value' => $faker->randomElement(
                [
                    'GB',
                    'TB',
                    'PB',
                    'MB',
                ]
            ),
        ];
    }
);
$factory->define(
    \App\Models\StorageType::class,
    function (Faker\Generator $faker) {
        return [
            'value' => $faker->randomElement(
                [
                    'HD',
                    'SDD',
                ]
            ),
        ];
    }
);

$factory->define(
    App\Models\Storage::class,
    function (Faker\Generator $faker) {
        $faker = Faker\Factory::create('de_DE');

        return [
            'amount'     => $faker->numberBetween(1, 100),
            'unit_id'       => \App\Models\StorageUnit::firstOrFail(),
            'type_id'       => \App\Models\StorageType::firstOrFail(),
            'raid'       => $faker->boolean(),
            'raid_level' => $faker->randomDigit,
        ];
    }
);