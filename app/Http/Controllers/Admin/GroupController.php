<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\DestroyRequest;
use App\Http\Requests\Admin\Group\StoreRequest;
use App\Services\Admin\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
	public function __construct(
		private GroupService $groupService
	) {}
	
	public function store(StoreRequest $request, int $formId) {
		return $this->groupService->create(
			$formId,
			$request->input('name')
		);
	}
	
	public function destroy(DestroyRequest $request, int $formId, int $groupId) {
		$destroyResult = $this->groupService
								->destroy($formId, $groupId);
		
		return response()->json($destroyResult);
	}
}
