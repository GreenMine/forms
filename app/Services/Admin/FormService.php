<?php
namespace App\Services\Admin;

use App\Models\Form;

class FormService {
	public function create(string $title, string $name) : Form {
		return Form::create([
			'title' => $title,
			'name' => $name
		]);
	}
	
	public function destroy(int $formId) : int {
		return Form::destroy($formId);
	}
	
	public function get(int $id) : Form {
		return Form::find($id);
	}
}
