<?php
namespace App\Services\Admin;

use App\Models\QuestionGroup;

class GroupService {
	public function __construct(
		private FormService $formService
	) {}
	
	public function create(int $formId, string $name) {
		$form = $this->formService->get($formId);
		return $form->groups()->create([
			'name' => $name
		]);
	}
	
	public function destroy(int $_formId, int $groupId) {
		return QuestionGroup::destroy($groupId);
	}
}
