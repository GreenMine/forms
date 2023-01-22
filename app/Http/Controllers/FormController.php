<?php

namespace App\Http\Controllers;

use App\Services\FormService;

class FormController extends Controller {
	public function __construct(
		private FormService $formService
	) {}
	
	
	public function show(int $formId) {
		$form = $this->formService->get($formId);
		return view('form')->with('form', $form);
	}
}
