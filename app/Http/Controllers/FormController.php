<?php

namespace App\Http\Controllers;

use App\Models\Form;

class FormController extends Controller
{
	public function show(Form $form) {
		return view('form')->with('form', $form);
	}
}
