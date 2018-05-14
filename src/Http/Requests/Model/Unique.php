<?php

namespace CrCms\Document\Http\Requests\Model;

use CrCms\Document\Models\Model;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class Unique implements Rule
{

    protected $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function passes($attribute, $value)
    {
        return Model::where($attribute,$value)->where('_id',$this->id)->first();
    }

    public function message()
    {
        return trans('document::app.model.table_name');
    }

}