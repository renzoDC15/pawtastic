<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'A photo update for you along',
            'Notifications of sitter arrival',
            'Treats for your pet, with your',
        ];

        foreach ($services as $service) {
            Service::create([
                'description' => $service,
                'active' => 1,
            ]);
        }
    }
}
