<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Frequency;
class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frequencies = [
            'Recurring',
            'One Time',

        ];

        foreach ($frequencies as $freq) {
            Frequency::create([
                'description' => $freq,
                'active' => 1,
            ]);
        }
    }
}
