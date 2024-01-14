<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Roles;
use App\Models\Category;
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

        $category = [
            "name" => "Makanan",
        ];
        Category::create($category);

        $category = [
            "name" => "Minuman",
        ];
        Category::create($category);

        $admin = [
            "name" => "admin",
            "roles_id" => 1,
            "no_telp" => "081330293390",
            "email" => "admin@gmail.com",
            "password" => Hash::make("password"),
        ];

        User::create($admin);
        $admin = [
            "name" => "tenant",
            "roles_id" => 2,
            "no_telp" => "0813302933902",
            "email" => "t@gmail.com",
            "password" => Hash::make("password"),
        ];

        User::create($admin);

        $admin = [
            "name" => "Adit",
            "roles_id" => 3,
            "no_telp" => "081330293391",
            "email" => "a@gmail.com",
            "password" => Hash::make("password"),
        ];

        User::create($admin);

        User::factory(30)->create();
    }
}
