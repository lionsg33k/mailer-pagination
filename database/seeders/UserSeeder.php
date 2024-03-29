<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //* create unique users
        for ($i = 0; $i < 60; $i++) {

            User::create([
                "name" => fake()->name(),
                "email" => fake()->email(),
                "phone" => fake()->phoneNumber(),
                "city" => fake()->city(),
                "type" => "customer",
                "age" => fake()->numberBetween(17, 80),
                "password" => Hash::make("password")

            ]);
        }
        //* use  the same  row multiple time
        // User::factory(60)->create([
        //     "name"=> fake()->unique()->name(),
        //     "email"=> fake()->email(),
        //     "phone"=> fake()->phoneNumber(),
        //     "city"=> fake()->city(),
        //     "type"=> "customer",
        //     "age"=> fake()->numberBetween(17 , 80),
        //     "password" => Hash::make("password")
        // ]);
    }
}
