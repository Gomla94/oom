<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Group;
use App\Http\Resources\Api\V1\GroupsResource;
use App\Http\Controllers\Api\V1\BaseController;

class GroupsController extends BaseController
{
    public function index()
    {
        return $this->response(new GroupsResource(Group::get()), 'Groups fetched successfully');
    }
}