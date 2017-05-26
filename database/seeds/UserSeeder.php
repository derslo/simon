<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create(
            [
                'email' => 's.losse@dzh-online.de',
                'name' => 'Stephan Losse'
            ]
        )->each(function (\App\Models\User $u){
            $u->assignRole(\Spatie\Permission\Models\Role::findByName('superadmin'));
        });

        factory(\App\Models\User::class)->create(
            [
                'email' => 'm.losse@dzh-online.de',
                'name' => 'Melanie Losse'
            ]
        )->each(function (\App\Models\User $u){
            $u->assignRole(\Spatie\Permission\Models\Role::findByName('admin'));
        });
    }
}
