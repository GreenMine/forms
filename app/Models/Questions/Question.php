<?php
namespace App\Models\Questions;

use App\Enums\QuestionType;
use App\Models\QuestionContent;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property QuestionType $type
 *
 * @property QuestionContent $question
 * @property Variant[] $variants
 */
class Question extends Model implements QuestionInterface {
	use HasFactory, \Biscofil\LaravelSubmodels\HasSubModels;
	
	protected $table = 'questions';
	protected $casts = [
		'type' => QuestionType::class,
	];
	public $timestamps = false;
	
	public function question() {
		return $this->hasOne(QuestionContent::class, 'connected_to');
	}
	
	public function variants() {
		return $this->hasMany(Variant::class, 'connected_to');
	}
	
	/**
	 * @param Question $model
	 */
	public function getSubModelClass($model) {
		return __NAMESPACE__ . '\\' . $model->type->name;
	}
}
