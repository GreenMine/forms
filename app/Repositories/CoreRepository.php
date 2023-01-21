<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
	/**
	 * @var Model $model
	 */
	protected $model;
	
	public function __construct()
	{
		$this->model = app($this->getModelClass());
	}
	
	abstract protected function getModelClass();
	
	/**
	 * @return \Illuminate\Contracts\Foundation\Application|Model|mixed
	 */
	public function startConditions()
	{
		return clone $this->model;
	}
}