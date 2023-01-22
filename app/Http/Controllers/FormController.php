<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Services\FormService;

class FormController extends Controller {
	public function __construct(
		private FormService $formService
	) {}
	
	
	public function show(int $formId) {
		/** @var Form $form */
		$form = $this->formService->get($formId);
		return view('form')->with('form', $form);
	}
}
