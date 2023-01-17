<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\QuestionType;
use App\Models\Form;
use App\Models\Question;
use App\Models\QuestionStructure;
use App\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		Form::factory(1)->create()->each(function($form) {
			$questions_amount = mt_rand(15, 30);
			QuestionStructure::factory($questions_amount)->create([
				'form_id' => $form->id
			])->each(function(QuestionStructure $qStructure) {
				$qStructureId = $qStructure->id;
				
				$variants = array();
				$questions = array();
				switch($qStructure->type) {
					case QuestionType::Single:
					case QuestionType::Several:
						$questions = $this->create_question($qStructureId);
						$variants = $this->create_rand_variants($qStructureId);
						break;
					case QuestionType::DoubleDimension:
						$variants = $this->create_rand_variants($qStructureId);
						$questions = $this->create_rand_questions($qStructureId);
						break;
					case QuestionType::Text:
						$questions = $this->create_question($qStructureId);
						break;
				}
				
				$qStructure->structure = json_encode([
					'variants' => $variants,
					'questions' => $questions
				]);
				$qStructure->save();
			});
		});
    }
	
	private function create_rand_questions(int $structure_id, $amount = 0) : array {
		if($amount === 0)
			$amount = fake()->randomNumber(8);
		
		return Collection::range(0, $amount)
			->map(fn() => $this->create_question($structure_id))->all();
	}
	
	private function create_question(int $structure_id, $text = null): Question {
		return Question::create([
			'text' => $text ?? fake()->realText(50),
			'connected_to' => $structure_id
		]);
	}
	
	private function create_rand_variants(int $structure_id, $amount = 0) : array {
		if($amount === 0)
			$amount = fake()->randomNumber(4);
		
		return Collection::range(0, $amount)
				->map(fn() => $this->create_variant($structure_id))->all();
	}
	
	private function create_variant(int $structure_id, $text = null) : Variant {
		return Variant::create([
			'text' => $text ?? fake()->realText(10),
			'connected_to' => $structure_id
		]);
	}
}
