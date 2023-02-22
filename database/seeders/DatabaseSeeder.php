<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::create([
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name' => "Ouail Nazim",
            'email' => "ouail@gmail.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        Language::create(["code" => "en",
            "name" => "English",
            "url" => "?lang=en",
            "src" => "/images/flags/en_flag.png"
        ]);
        Language::create(["code" => "fr",
            "name" => "French",
            "url" => "?lang=fr",
            "src" => "/images/flags/fr_flag.png"
        ]);
    }
}
