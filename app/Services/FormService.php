<?php
namespace App\Services;

use App\Models\Form;

class FormService {
	public function get(int $formId) {
		return Form::find($formId);
	}
}
