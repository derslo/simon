<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(
    App\Models\Server::class,
    function (Faker\Generator $faker) {
        $faker = Faker\Factory::create('de_DE');
        return [
            'name'           => ($name = $faker->domainWord),
            'fqdn' => $name . '.' . $faker->domainName,
            'public' => $faker->boolean(80),
            'location_id' => factory(\App\Models\Location::class)->create()->id,
            'ipV4' => $faker->ipv4,
            'ipV6' => $faker->ipv6,
            'description' => $faker->text(),
            'contact_id' => factory(\App\Models\Contact::class)->create()->id,
            'os_id' => factory(\App\Models\Os::class)->create()->id,
            'virtual' => $faker->boolean(),
            'ram'   => ($faker->numberBetween(1,64) * 2),
            'cores'   => ($faker->numberBetween(1,8) * 2),
            'storage_id' => factory(\App\Models\Storage::class)->create()->id,

        ];
    }
);