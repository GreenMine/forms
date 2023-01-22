<?php
namespace App\Services\Admin;

use App\Models\Form;
use App\Services\FormService;
use App\Statistics\FormStatistics;

class StatisticsService {
	public function get(int $formId) {
		/** @var Form $form */
		$form = Form::find($formId);
		
		/** @var FormStatistics $formStatistics */
		$formStatistics = app(FormStatistics::class);
		
		return $formStatistics->generateReport($form);
	}
}