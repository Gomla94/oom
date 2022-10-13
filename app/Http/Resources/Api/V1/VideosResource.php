<?php

namespace App\Http\Resources\Api\V1;

use App\Helpers\Classes\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class VideosResource extends JsonResource
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
            'link'         => ($this->provider == 'local' ) ? Helper::storage_image($this->link) : $this->link,
            'video_image'  => Helper::storage_image('lessons_videos/images/video_play-12.png'),
            'comments'     => CommentsResource::collection($this->comments)
        ]);
    }
}
