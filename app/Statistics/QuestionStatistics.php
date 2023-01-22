<?php
namespace App\Statistics;

use App\Models\Questions\DoubleDimension;
use App\Models\Questions\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionContent;
use App\Models\Answer;

class QuestionStatistics implements StatisticsInterface {
	/**
	 * @param Question $question
	 */
	public function generateReport($question) {
		if($question instanceof DoubleDimension) {
			return $question->questions
				->map(fn($q) => ['question' => $q, 'statistics' => $this->getQuestionStats($q)])
				->all();
		}
		
		return $this->getQuestionStats($question->question);
	}
	
	/**
	 * @param QuestionContent $questionContent
	 * @return Collection<int, Answer>
	 */
	public function getQuestionStats(QuestionContent $questionContent) {
		//FIXME: move to question statistics
		return Answer::select('variant_id', DB::raw('count(*) as total'))
			->where('question_content_id', $questionContent->id)
			->groupBy('variant_id')
			->with('variant')
			->orderByDesc('total')
			->get();
	}
}
