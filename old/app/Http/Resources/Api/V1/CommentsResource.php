<?php

namespace App\Http\Resources\Api\V1;

use App\Http\Resources\Api\V1\RepliesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $parent = $this->replies()->first();

        return array_merge(parent::toArray($request),
        [
            'text'              => $parent->text,
            'replies'           => RepliesResource::collection($this->replies()->where('id', '!=', $parent->id)->get())
        ]);
    }
}
