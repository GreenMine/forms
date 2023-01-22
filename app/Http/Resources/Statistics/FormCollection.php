<?php

namespace App\Http\Resources\Statistics;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FormCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		return QuestionResource::collection($this->collection);
    }
}
