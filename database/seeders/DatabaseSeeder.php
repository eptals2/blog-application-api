<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
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
        User::factory()->count(10)->create();
        Project::factory()->count(10)->create();
        Employee::factory()->count(10)->create();
        Task::factory()->count(10)->create();

        $this->call([
            UserSeeder::class,
        ]);

    }
}
