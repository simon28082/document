<?php

namespace CrCms\Document\Http\Resources;

use CrCms\Foundation\App\Http\Resources\Resource;

class ModelResource extends Resource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'table_name' => $this->table_name,
            'status' => $this->status,
            'status_convert' => CategoryAttribute::getStaticTransform(CategoryAttribute::KEY_STATUS . '.' . strval($this->status)),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'hide_fields' => $this->hide_fields,
        ];

    }


}