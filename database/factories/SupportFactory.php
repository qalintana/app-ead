<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class SupportFactory extends Factory
{
    protected $model = Support::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'lesson_id' => Lesson::factory(),
            // 'user_id' => '1cdcd699-b41c-4105-8a7e-c688eeb95a34',
            // 'lesson_id' => '0d70e72b-c61d-4788-9bea-4b6e2cc1b3d9',
            // 'name' => $this->faker->name(),
            'description' => $this->faker->sentence(50),
            'status' => 'P'
        ];
    }
}
