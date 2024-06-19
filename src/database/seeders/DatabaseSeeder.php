<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Like;
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
        $this->call(UsersTableSeeder::class);
        $this->call(ConditionsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        User::factory(10)->create();
    }
}
