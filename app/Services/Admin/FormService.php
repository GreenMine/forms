<?php
namespace App\Services\Admin;

use App\Models\Form;

class FormService {
	public function create(string $title, string $name) {
		return Form::create([
			'title' => $title,
			'name' => $name
		]);
	}
	
	public function destroy(int $formId) {
		return Form::destroy($formId);
	}
}
