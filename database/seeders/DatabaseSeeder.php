<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Beverage;
use App\Models\Category;
use App\Models\Owner;
use App\Models\Contact;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $category=Category::factory()->create();
        Beverage::factory(3)
        ->for($category)
        ->create();
        Category::factory(3)->create();
        Owner::factory(3)->create();
        Contact::factory(3)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
