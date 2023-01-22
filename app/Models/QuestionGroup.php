<?php

namespace App\Models;

use App\Models\Questions\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 *
 * @property Collection<int, Question> $questions
 */
class QuestionGroup extends Model
{
    use HasFactory;
	
	public $timestamps = false;
	
	protected $fillable = ['name'];
	
	public function questions() {
		return $this->hasMany(Question::class);
	}
}
