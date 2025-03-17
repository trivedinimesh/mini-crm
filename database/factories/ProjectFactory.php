<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use App\StatusEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id');
        $clients = Client::pluck('id');
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence,
            'deadline_at' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'status' => $this->faker->randomElement(StatusEnum::cases())->value,
            'user_id' => $users->random(),
            'client_id' => $clients->random(),
        ];
    }
}
