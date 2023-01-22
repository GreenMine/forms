<?php

namespace App\Http\Resources\Statistics;

use Illuminate\Http\Resources\Json\JsonResource;

class DoubleDimensionQuestionStatisticsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		$question = $this['question'];
		return [
			'question_content_id' => $question->id,
			'question_text' => $question->text,
			'statistics' => StatisticResource::collection($this['statistics'])
		];
    }
}
