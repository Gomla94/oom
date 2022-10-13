<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Grade;
use App\Http\Resources\Api\V1\GradesResource;
use App\Http\Resources\Api\V1\GroupsResource;

class GradesController extends BaseController
{
    public function index()
    {
        return $this->response(new GradesResource(Grade::get()));
    }

    public function groups($id)
    {
        $grade = Grade::where('id', $id);
        if (! $grade->exists())
            return $this->error("الصف المطلوب غير موجود", [], 404);
        return $this->response(new GroupsResource($grade->first()->groups()->get()));
    }
}
