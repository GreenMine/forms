<?php
namespace App\Repositories;

use App\Models\Form;

class FormRepository extends CoreRepository {
	
	protected function getModelClass() {
		return Form::class;
	}
	
	public function get(int $formId) : Form {
		return $this->startConditions()->find($formId);
	}
	
}