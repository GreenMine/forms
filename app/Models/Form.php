<?php

namespace App\Models;

use App\Models\Questions\Question;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @property int $id
 * @property string $name
 * @property string title
 * @property array $meta
 * @property Collection<int, QuestionGroup> groups
 * @property Collection<int, Question> questions
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class Form extends Model
{
    use HasFactory;
	
	protected $with = ['questions'];
	protected $fillable = ['title', 'name'];
	
	public function groups() {
		return $this->hasMany(QuestionGroup::class);
	}
	
	public function questions() {
		return $this->hasManyThrough(Question::class, QuestionGroup::class);
	}
}
