<?php

namespace App\Http\Resources\Api\V1;

use App\Helpers\Classes\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class PdfFilesResource extends JsonResource
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
            'file_src'  => $this->filterFileSrc($this->file_src)
        ]);
    }

    private function filterFileSrc($src)
    {
        if(filter_var($src, FILTER_VALIDATE_URL))
            return $src;
        return Helper::storage_image($src);
    }
}
