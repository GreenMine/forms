<?php
namespace App\Models\Questions;

use App\Enums\QuestionType;
use App\Models\Question;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;

/**
 * @property QuestionType $type
 *
 * @property Question $question
 * @property Variant[] $variants
 */
class BaseQuestion extends Model implements BaseQuestionInterface {
	use \Biscofil\LaravelSubmodels\HasSubModels;
	
	protected $table = 'question_structures';
	
	protected $casts = [
		'type' => QuestionType::class,
	];
	
	/**
	 * @param BaseQuestion $model
	 */
	public function getSubModelClass($model) {
		return __NAMESPACE__ . '\\' . $model->type->name;
	}
	
	public function question() {
		return $this->hasOne(Question::class, 'connected_to');
	}
	
	public function variants() {
		return $this->hasMany(Variant::class, 'connected_to');
	}
}
