<?php
namespace App\Repositories;

use App\Models\Form;

class FormRepository extends CoreRepository {
	
	protected function getModelClass() {
		return Form::class;
	}
	
	public function get(int $formId) {
		return $this->startConditions()
						->where('id', $formId)
						->with(['questions', 'questions.question', 'questions.variants'])
						->first();
	}
}