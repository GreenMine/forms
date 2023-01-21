<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\QuestionType;
use App\Models\Form;
use App\Models\QuestionContent;
use App\Models\Questions\Question;
use App\Models\Variant;
use Database\Factories\QuestionFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		Form::factory(1)->create()->each(function(Form $form) {
			Log::info("Created form \"$form->name\"");
			$questions_amount = mt_rand(15, 30);
			QuestionFactory::new()
				->count($questions_amount)
				->create(['form_id' => $form->id])
				->each(function(Question $qStructure) {
				$qStructureId = $qStructure->id;

				Log::info("Created question structure(id $qStructureId)");

				//FIXME: match
				switch($qStructure->type) {
					case QuestionType::Single:
					case QuestionType::Several:
						$this->create_rand_questions($qStructureId, 1);
						$this->create_rand_variants($qStructureId);
						break;
					case QuestionType::DoubleDimension:
						$this->create_rand_variants($qStructureId);
						$this->create_rand_questions($qStructureId);
						break;
					case QuestionType::Text:
						$this->create_rand_questions($qStructureId, 1);
						break;
				}
			});
		});
    }
	
	private function create_rand_questions(int $structureId, int $amount = 0) : array {
		if($amount === 0)
			$amount = fake()->numberBetween(2, 10);
		
		Log::info("Creating $amount rand questions for $structureId");
		
		$questions = QuestionContent::factory($amount)->create([
			'connected_to' => $structureId
		])->map(fn(QuestionContent $q) => $q->id)->toArray();
		
		Log::info("Successfully created $amount rand questions for $structureId");
		
		return $questions;
	}
	
	private function create_rand_variants(int $structureId, int $amount = 0) : array {
		if($amount === 0)
			$amount = fake()->numberBetween(2, 8);
		
		Log::info("Creating $amount rand variants for $structureId");
		
		$variants = Variant::factory($amount)->create([
			'connected_to' => $structureId
		])->map(fn(Variant $v) => $v->id)->toArray();
		
		Log::info("Successfully created $amount rand variants for $structureId");
		
		return $variants;
	}
}
