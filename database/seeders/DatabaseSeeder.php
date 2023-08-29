<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        AdminUser::create(
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'phone'=>'09953486445',
                'password'=>Hash::make('admin123')
            ]
            );

            User::create(
                [
                    'name'=>'user',
                    'email'=>'user@gmail.com',
                    'phone'=>'09953486445',
                    'password'=>Hash::make('users123')
                ]
                );
    }
}
