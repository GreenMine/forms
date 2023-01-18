<?php
namespace App\Models\Questions;

use App\Models\Question;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $type
 */
class BaseQuestion extends Model implements BaseQuestionInterface {
	protected $table = 'question_structures';
	
	use \Biscofil\LaravelSubmodels\HasSubModels;
	
	const TYPES_ASSOCIATION = [
		0 => Single::class,
		2 => DoubleDimension::class
	];
	
	/**
	 * @param BaseQuestion $model
	 */
	public function getSubModelClass($model) {
		$modelType = $model->type;
		if(isset(self::TYPES_ASSOCIATION[$modelType]))
			return self::TYPES_ASSOCIATION[$modelType];
		
		return Single::class;
	}
	
	public function question() {
		return $this->hasOne(Question::class);
	}
	
	public function variants() {
		return $this->hasMany(Variant::class);
	}
}
