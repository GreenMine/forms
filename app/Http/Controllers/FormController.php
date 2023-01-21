<?php

namespace App\Http\Controllers;

use App\Repositories\FormRepository;

class FormController extends Controller {
	public function __construct(
		private FormRepository $formRepository
	) {}
	
	
	public function show(int $formId) {
		$form = $this->formRepository->get($formId);
		return view('form')->with('form', $form);
	}
}
