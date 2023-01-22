<?php

namespace App\Http\Controllers;

use App\Repositories\StatsRepository;
use Illuminate\Http\Request;

class StatsController extends Controller
{
	public function __construct(
		private StatsRepository $statsRepository
	) {}
	
	public function show(int $formId) {
		$stats = $this->statsRepository->getStats($formId);
		return response()->json($stats);
	}
}
