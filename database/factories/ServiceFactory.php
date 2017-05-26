<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    App\Models\Service::class,
    function (Faker\Generator $faker) {
        $faker = Faker\Factory::create('de_DE');
        return [
            'name'           => $faker->name . ' Dienst',
            'public' => $faker->boolean(80),
            'contact_id' => factory(\App\Models\Contact::class)->create()->id,
            'description' => $faker->paragraph(),
            'url' => ($url = $faker->url),
            'admin_url' => $url .'/admin',
            'server_id' => factory(\App\Models\Server::class)->create()->id,
        ];
    }
);