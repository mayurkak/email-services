<?php

namespace Database\Factories;
use App\Models\QuestionList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionsList>
 */
class QuestionListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Questions' => $this->faker->sentence(2),
        ];
    }
}
