<?php

namespace App\Http\Controllers;

use App\Http\Resources\Statistics\FormCollection;
use App\Services\StatisticsService;

class StatisticsController extends Controller
{
	public function __construct(
		private StatisticsService $statisticsService
	) {}
	
	public function show(int $formId) {
		$stats = $this->statisticsService->get($formId);
		return new FormCollection($stats);
	}
}
