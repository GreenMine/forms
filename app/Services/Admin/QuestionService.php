<?php
namespace App\Services\Admin;

class QuestionService {
	public function __construct(
		private FormService $formService
	) {}
	
	public function create(int $formId, string $name) {
	}
	
	public function destroy(int $_formId, int $groupId) {
	}
}
