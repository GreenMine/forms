<?php
namespace App\Models\Questions;

use App\Models\QuestionContent;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 * @property Collection<int, QuestionContent> $questions
 */
class DoubleDimension extends Question {
	public function questions() {
		return $this->hasMany(QuestionContent::class, 'connected_to');
	}
}
