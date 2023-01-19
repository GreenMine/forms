<?php
namespace App\Models\Questions;

use App\Models\Question;

class DoubleDimension extends BaseQuestion {
	public function question() {
		return $this->hasMany(Question::class, 'connected_to');
	}
}
