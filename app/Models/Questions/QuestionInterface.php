<?php
namespace App\Models\Questions;

interface QuestionInterface {
	public function question();
	
	public function variants();
}