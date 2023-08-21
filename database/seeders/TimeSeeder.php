<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = [
            'Morning',
            'Afternoon',
            'Evening',
        ];

        foreach ($times as $time) {
            Time::create([
                'description' => $time,
                'active' => 1,
            ]);
        }
    }
}
