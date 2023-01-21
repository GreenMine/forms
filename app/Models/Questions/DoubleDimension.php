<?php
namespace App\Models\Questions;

use App\Models\QuestionContent;

/**
 *
 * @property QuestionContent[] $questions
 */
class DoubleDimension extends Question {
	public function questions() {
		return $this->hasMany(QuestionContent::class, 'connected_to');
	}
}
