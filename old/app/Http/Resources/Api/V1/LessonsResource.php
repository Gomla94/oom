<?php

namespace App\Http\Resources\Api\V1;

use App\Helpers\Classes\Helper;
use App\Http\Resources\Api\V1\VideosResource;
use App\Http\Resources\Api\V1\QuestionsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return array_merge(parent::toArray($request),
        [
            'image'             => Helper::storage_image($this->image),
            'videos'            => VideosResource::collection($this->videos),
            'pdf_files'         => PdfFilesResource::collection($this->files),
        ]);
    }
}
