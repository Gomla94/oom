<?php

namespace App\Http\Resources\Api\V1;

use App\Http\Resources\Api\V1\AlertsResource;
use App\Http\Resources\Api\V1\GroupsResource;
use App\Http\Resources\Api\V1\MonthsResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\V1\SubscriptionsResource;

class StudentsResource extends JsonResource
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
            'subscriptions_month'   => new SubscriptionsResource($this->subscriptions()->orderBy('id', 'DESC')->first()),
            'months'                => MonthsResource::collection($this->months),
            'group'                 => new GroupsResource($this->group),
            'grade'                 => $this->grade(),
           // 'alerts'                => new AlertsResource($this->alerts)
        ]);
    }
}
