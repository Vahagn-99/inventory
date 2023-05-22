<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var User $admin */
        $admin = User::factory()
            ->create([
                'name' => 'admin'
                , 'email' => 'admin@inventroy.com'
                , 'password' => Hash::make('password')
            ]);
        $admin->assignRole('admin');

        /** @var User $super */
        $super = User::factory()
            ->create([
                'name' => 'super admin'
                , 'email' => 'super@inventroy.com'
                , 'password' => Hash::make('password')
            ]);
        $super->assignRole('super-admin');
    }
}
