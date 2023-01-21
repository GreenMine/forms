<?php

namespace Database\Factories;

use App\Enums\QuestionType;
use App\Models\QuestionContent;
use App\Models\Questions\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Questions\Question>
 */
class QuestionFactory extends Factory
{
	protected $model = Question::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
			'type' => $this->faker->randomElement(QuestionType::getAllValues())
        ];
    }
}
