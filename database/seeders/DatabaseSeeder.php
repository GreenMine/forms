<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Form;
use App\Models\QuestionStructure;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		Form::factory(10)->create()->each(function($form) {
			$questions_amount = mt_rand(15, 30);
			QuestionStructure::factory($questions_amount)->create([
				'form_id' => $form->id
			]);
		});
    }
}
