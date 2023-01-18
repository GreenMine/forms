<?php

namespace App\Models;

use App\Enums\QuestionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @property int $id
 * @property Form $form
 * @property QuestionType $type
 * @property Question $question
 * @property Variant[] $variants
 */
class QuestionStructure extends Model
{
    use HasFactory;
	
	public $timestamps = false;
	
	protected $casts = [
		'type' => QuestionType::class,
		'structure' => 'array'
	];
	
	public function question() {
		return $this->type == QuestionType::DoubleDimension ?
							$this->hasMany(Question::class, 'connected_to') :
							$this->hasOne(Question::class, 'connected_to');
	}
	
	public function form() : BelongsTo {
		return $this->belongsTo(Form::class);
	}
	
	public function variants() : HasMany {
		return $this->hasMany(Variant::class, 'connected_to');
	}
}
