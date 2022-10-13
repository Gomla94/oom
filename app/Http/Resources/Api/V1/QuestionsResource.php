<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Classes\Helper;

class QuestionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return array_merge(parent::toArray($request),
        [
            'image'             => Helper::storage_image($this->image),
            'answers'       => AnswersResource::collection($this->answers()->inRandomOrder()->get())
        ]);
    }

    /*public function toArray($request)
    {
        return parent::toArray($request);
    }*/
}