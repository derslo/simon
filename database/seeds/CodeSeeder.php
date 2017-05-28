<?php

use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            \App\Models\StorageUnit::class => [
                'MB',
                'GB',
                'TB',
                'PB',
            ],
            \App\Models\StorageType::class => [
                'HD',
                'SDD',
            ],
        ];

        foreach ($data as $key => $values) {
            foreach ($values as $value) {
                factory($key)->create(
                    ['value' => $value]
                );
            }
        }
    }
}
