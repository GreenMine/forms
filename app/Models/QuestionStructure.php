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
 * @property array $structure
 */
class QuestionStructure extends Model
{
    use HasFactory;
	
	protected $casts = [
		'type' => QuestionType::class
	];
	
	public function form() : BelongsTo {
		return $this->belongsTo(Form::class);
	}
	
	public function variants() : HasMany {
		return $this->hasMany(Variant::class);
	}
}
