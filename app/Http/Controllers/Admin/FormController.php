<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Form\DestroyRequest;
use App\Http\Requests\Admin\Form\StoreRequest;
use App\Services\Admin\FormService;

class FormController extends Controller
{
	public function __construct(
		private FormService $formService
	) {}
	
	public function store(StoreRequest $request) {
		$createdForm = $this->formService->create(
			$request->input('title'),
			$request->input('name')
		);
		
		return response()->json($createdForm);
	}
	
	public function destroy(DestroyRequest $_request, int $formId) {
		$destroyResult = $this->formService
							->destroy($formId);
		
		return response()->json($destroyResult);
	}
}
