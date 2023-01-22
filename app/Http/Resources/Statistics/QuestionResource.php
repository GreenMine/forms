<?php

namespace App\Http\Resources\Statistics;

use App\Enums\QuestionType;
use App\Models\Questions\DoubleDimension;
use App\Models\Variant;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
		/** @var QuestionType $type */
		$type = $question->type;
		$array = [
			'question_id' => $question->id,
			'question_type' => $type,
		];
		
		if(!$question instanceof DoubleDimension) {
			$array['question_text'] = $question->question->text;
			$array['question_content_id'] = $question->question->id;
			$array['statistics'] = StatisticResource::collection($this['statistics']);
		} else {
			$array['statistics'] = DoubleDimensionQuestionStatisticsResource::collection($this['statistics']);
		}
		
		return $array;
    }
}
