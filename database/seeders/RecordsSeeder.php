<?php

namespace Database\Seeders;

use App\Enums\QuestionType;
use App\Models\Answer;
use App\Models\Form;
use App\Models\Questions\DoubleDimension;
use App\Models\Questions\Question;
use App\Models\Record;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Form::all()->each(function(Form $form) {
			$questions = $form->questions;
			
			$records_amount = mt_rand(1000, 5000);
			Record::factory($records_amount)
					->create()
					->each(function(Record $record) use ($questions) {
						$questions->each(function (Question $question) use ($record) {
							$variants = $question->variants->toArray();
							$questionContentId = $question->question->id;
							
							switch($question->type) {
								case QuestionType::Single:
									$variant = fake()->randomElement($variants);
									self::create_answer($record->id, $questionContentId, $variant);
									break;
								case QuestionType::Several:
									$variantsCopy = $variants;
									shuffle($variantsCopy);
									
									$answersAmount = mt_rand(1, count($variantsCopy));
									$variantsCopy = array_slice($variantsCopy, 0, $answersAmount);
									foreach($variantsCopy as $variant)
										self::create_answer($record->id, $questionContentId, $variant);
									break;
								case QuestionType::DoubleDimension:
									/** @var DoubleDimension $question */
									foreach($question->questions as $questionContent) {
										$variant = fake()->randomElement($variants);
										self::create_answer($record->id, $questionContent->id, $variant);
									}
									break;
								case QuestionType::Text:
									$variant = Variant::firstOrCreate([
										'text' => fake()->word(),
										'connected_to' => $question->id
									])->toArray();
									self::create_answer($record->id, $questionContentId, $variant);
									break;
							}
						});
					});
		});
    }
	
	private static function create_answer(int $recordId, int $questionId, array $variant) {
		return Answer::create([
			'record_id' => $recordId,
			'question_content_id' => $questionId,
			'variant_id' => $variant['id']
		]);
	}
}
