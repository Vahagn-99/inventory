<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserRoleAndPermissionSeeder::class);
        $this->call(DefaultUsersSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
