<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Roles;
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

        $rolesName = [
            "admin",
            "customer",
            "tenant",
        ];

        foreach ($rolesName as $key) {
            Roles::create([
                "name" => $key
            ]);
        }

        $admin = [
            "name" => "admin",
            "username" => "admin",
            "roles_id" => 1,
            "no_telp" => "081330293390",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin"),
        ];

        User::create($admin);
    }
}
