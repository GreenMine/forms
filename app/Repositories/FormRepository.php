<?php
namespace App\Repositories;

use App\Models\Form;
use App\Models\QuestionContent;
use App\Models\Questions\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class FormRepository extends CoreRepository {
	
	protected function getModelClass() {
		return Form::class;
	}
	
	public function get(int $formId) : Form {
		return $this->startConditions()->find($formId);
	}
	
	public function getStats(int $formId) {
		$stats = array();
		
		$form = $this->get($formId);
		foreach($this->iter_question_contents($form) as $packedQuestions) {
			/**
			 * @var Question $question
			 * @var QuestionContent $content
			 */
			list($question, $content) = $packedQuestions;
			
			$stats[] = DB::table('answers')
								->select('variant_id', DB::raw('count(*) as total'))
								->where('question_content_id', $content->id)
								->groupBy('variant_id')
								->orderByDesc('total')
								->get();
		}
		
		dd($stats);
	}
	
	private function iter_question_contents(Form $form) {
		return LazyCollection::make(function() use ($form) {
			foreach($form->questions as $question)
				foreach($question->questions as $questionContent)
					yield [$question, $questionContent];
		});
	}
}