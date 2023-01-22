<?php
namespace App\Services;

use App\Models\Form;
use App\Statistics\FormStatistics;

class StatisticsService {
	public function get(int $formId) {
		/** @var Form $form */
		$form = app(FormService::class)->get($formId);
		
		/** @var FormStatistics $formStatistics */
		$formStatistics = app(FormStatistics::class);
		
		return $formStatistics->generateReport($form);
	}
}