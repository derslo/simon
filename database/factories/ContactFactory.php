<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    App\Models\Contact::class,
    function ($faker) {
        $faker = Faker\Factory::create('de_DE');

        return [
            'name'            => $faker->name,
            'email'           => $faker->companyEmail,
            'mobile'          => $faker->phoneNumber,
            'organisation_id' => factory(\App\Models\Organisation::class)->create()->id,
        ];
    }
);