<?php
namespace App\Models\Questions;

use App\Models\Question;

/**
 *
 * @property Question[] $questions
 */
class DoubleDimension extends BaseQuestion {
	public function questions() {
		return $this->hasMany(Question::class, 'connected_to');
	}
}
