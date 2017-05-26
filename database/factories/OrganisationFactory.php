<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    App\Models\Organisation::class,
    function ($faker) {
        $faker = Faker\Factory::create('de_DE');
        return [
            'name'           => $faker->company,
        ];
    }
);