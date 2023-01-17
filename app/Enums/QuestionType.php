<?php

namespace App\Enums;

enum QuestionType: int {
	case Single = 0;
	case Several = 1;
	case DoubleDimension = 2;
	case Text = 3;
	
	public static function getAllValues() {
		return array_column(self::cases(), 'value');
	}
}