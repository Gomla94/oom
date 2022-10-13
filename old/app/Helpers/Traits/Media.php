<?php

namespace App\Helpers\Traits;

trait Media
{
    public static function storage_image($src)
    {
        return url('uploads/'. $src);
    }
}
