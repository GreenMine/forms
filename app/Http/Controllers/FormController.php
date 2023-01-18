<?php

namespace App\Http\Controllers;

use App\Models\Form;

class FormController extends Controller
{
	public function show(Form $form) {
		dd($form->questions);
		return view('form')->with('form', $form);
	}
}
