<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Option;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "julien",
            "email" => "ju@mail.com",
        ]);
        $options = Option::factory(10)->create();
        Property::factory(50)
            ->hasAttached($options->random(3))
            ->create();
    }
}
