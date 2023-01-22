<?php
namespace App\Repositories;

use App\Models\Answer;
use App\Models\Form;
use App\Models\QuestionContent;
use App\Models\Questions\DoubleDimension;
use App\Models\Questions\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class StatsRepository extends CoreRepository {
	protected function getModelClass() {
		return Form::class;
	}
	
	public function getStats(int $formId) {
		$stats = array();
		
		/** @var Form $form */
		$form = app(FormRepository::class)->get($formId);
		foreach($form->questions as $question) {
			/**
			 * @var Question $question
			 * @var QuestionContent $content
			 */
			$stat = null;
			if($question instanceof DoubleDimension) {
				$stat = $question->questions
									->map(fn($q) => ['question' => $q, 'stat' => $this->getQuestionStats($q)])
									->all();
			} else {
				$stat = $this->getQuestionStats($question->question);
			}
			
			$stats[] = [
				'question' => $question,
				'stat' => $stat
			];
		}
		
		return $stats;
	}
	
	/**
	 * @param QuestionContent $questionContent
	 * @return Collection<int, Answer>
	 */
	public function getQuestionStats(QuestionContent $questionContent) {
		return Answer::select('variant_id', DB::raw('count(*) as total'))
			->where('question_content_id', $questionContent->id)
			->groupBy('variant_id')
			->with('variant')
			->orderByDesc('total')
			->get();
	}
	
	private function iter_question_contents(Form $form) {
		return LazyCollection::make(function() use ($form) {
			foreach($form->questions as $question)
				foreach($question->questions as $questionContent)
					yield [$question, $questionContent];
		});
	}
}
