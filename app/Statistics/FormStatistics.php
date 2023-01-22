<?php
namespace App\Statistics;

use App\Models\Form;
use App\Models\Questions\Question;

class FormStatistics implements StatisticsInterface {
	/**
	 * @param Form $form
	 * @return array
	 */
	public function generateReport($form) {
		/** @var QuestionStatistics $questionStatistics */
		$questionStatistics = app(QuestionStatistics::class);
		return $form->questions->toBase()->map(function(Question $question) use ($questionStatistics) {
			//FIXME: stdClass
			return [
				'question' => $question,
				'statistics' => $questionStatistics->generateReport($question)
			];
		});
	}
	
}