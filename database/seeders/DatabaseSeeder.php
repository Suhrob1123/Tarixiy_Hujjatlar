<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->create([
            'name' => 'Suhrob',
            'email' => 'ruzmatovsuxrob123@gmail.com',
            'password' =>'12345678'
        ]);

        $this->call(
            [RoleandPermissionSeeder::class]
        );

        $user = User::where('email', 'ruzmatovsuxrob123@gmail.com')->first();
        $user->assignRole('admin');
    }
}
