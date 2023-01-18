<?php
namespace App\Models\Questions;

interface BaseQuestionInterface {
	public function question();
	
	public function variants();
}