<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'employee_id' => Employee::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'due_date' => fake()->dateTimeBetween('now', '+30 days'),
            'priority' => fake()->randomElement([
                'Low',
                'Medium',
                'High',
            ]),
            'status' => fake()->randomElement([
                'Pending',
                'Ongoing',
                'Completed',
            ]),
        ];
    }
}
