<?php

namespace App\Helpers\Traits;

Trait Getters
{
    public static function get($model)
    {
        $model = 'App\\Models\\' . $model;
        return $model::get();
    }
}
