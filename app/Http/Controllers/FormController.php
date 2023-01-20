<?php

namespace App\Http\Controllers;

use App\Models\Form;

class FormController extends Controller
{
	public function show(int $formId) {
		$form = Form::where('id', $formId)->with(['questions', 'questions.question', 'questions.variants'])->first();
		return view('form')->with('form', $form);
	}
}
