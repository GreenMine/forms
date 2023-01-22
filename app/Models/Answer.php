<?php

namespace App\Models;

use App\Models\Questions\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property Question $question
 * @property Variant $variant
 *
 * @mixin Builder
 */
class Answer extends Model
{
    use HasFactory;
	
	public $timestamps = false;
	
	public function question() {
		return $this->belongsTo(QuestionContent::class);
	}
	
	public function variant() {
		return $this->belongsTo(Variant::class);
	}
}
