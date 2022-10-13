<?php

namespace App\Models;

use App\Helpers\Classes\Helper;
use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model
{
    protected $fillable =
    [
        'lesson_id', 'title', 'file_src'
    ];

    public function getFileAttribute()
    {
        if (filter_var($this->attributes['file_src'], FILTER_VALIDATE_URL))
            return $this->attributes['file_src'];
        return Helper::storage_image($this->attributes['file_src']);
    }
}
