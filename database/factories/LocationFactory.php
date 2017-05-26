<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    App\Models\Location::class,
    function ($faker) {
        $faker = Faker\Factory::create('de_DE');

        return [
            'name'           => $faker->city,
        ];
    }
);