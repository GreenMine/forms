<?php

namespace Database\Factories;

use App\Enums\QuestionType;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionStructure>
 */
class QuestionStructureFactory extends Factory
{
	
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
			'type' => $this->faker->randomElement(QuestionType::getAllValues()),
			'structure' => json_encode([])
        ];
    }
}
