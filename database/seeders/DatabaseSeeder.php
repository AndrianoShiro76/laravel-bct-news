<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Andriano',
            'username' => 'andriano',
            'gender' => 'male',
            'age' => '28',
            'email' => 'andriano@gmail.com',
            'handphone' => '082128152340',
            'school' => 'bachelor',
            'country' => 'indonesia',
            'password' => bcrypt('12345')
        ]);
        // User::create([
        //     'name' => 'Maman',
        //     'email' => 'maman@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Football',
            'slug' => 'football'
        ]);
        Category::create([
            'name' => 'Basketball',
            'slug' => 'basketball'
        ]);
        Category::create([
            'name' => 'Moto GP',
            'slug' => 'moto-gp'
        ]);
        Category::create([
            'name' => 'Badminton',
            'slug' => 'badminton'
        ]);
        Category::create([
            'name' => 'Formula 1',
            'slug' => 'formula-1'
        ]);

        Sport::factory(30)->create();

   

    }
}
