<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CodeSeeder::class);

        if(env('APP_ENV') != 'production') {
            $this->call(ServiceSeeder::class);
        }
    }
}
