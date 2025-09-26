<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory(5)->create()->each(function ($company) {
            $users = User::factory(5)->create();
            $users->each(function ($user) use ($company) {
                Task::factory(3)->create([
                    'company_id' => $company->id,
                    'user_id' => $user->id
                ]);
            });
        });
    }
}
