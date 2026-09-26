<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => fake()->randomElement([
                'Backend Developer',
                'Frontend Developer',
                'Full Stack Developer',
                'QA Tester',
                'UI/UX Designer',
                'Project Manager',
                'Database Administrator',
            ]),
        ];
    }
}
