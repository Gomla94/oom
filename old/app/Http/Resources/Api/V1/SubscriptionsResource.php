<?php

namespace App\Http\Resources\Api\V1;

use App\Helpers\Classes\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionsResource extends JsonResource
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
            'attachement'           => Helper::storage_image($this->attachement)
        ]);
    }
}
