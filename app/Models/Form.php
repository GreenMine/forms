<?php

namespace App\Models;

use App\Models\Questions\BaseQuestion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @property int $id
 * @property string $name
 * @property string title
 * @property array $meta
 * @property QuestionStructure[] questions
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class Form extends Model
{
    use HasFactory;
	
	public function questions(): HasMany {
		return $this->hasMany(BaseQuestion::class);
	}
}
