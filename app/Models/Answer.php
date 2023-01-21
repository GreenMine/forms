<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
	
	public $timestamps = false;
	
	public function question() {
		return $this->hasOne(QuestionContent::class);
	}
	
	public function variant() {
		return $this->hasOne(Variant::class);
	}
}
