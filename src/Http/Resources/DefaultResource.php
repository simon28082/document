<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/20
 * Time: 11:26
 * Created by PhpStorm.
 */

namespace CrCms\Document\Http\Resources;

use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Support\Carbon;

class DefaultResource extends Resource
{
    protected $fields;

    public function __construct($resource, $fields)
    {
        parent::__construct($resource);
        $this->fields = $fields;
    }


    public function toArray($request)
    {
        return collect($this->fields)->mapWithKeys(function($field){
            if ($this->{$field} instanceof Carbon) {
                $value = $this->{$field}->toDateTimeString();
            } else {
                $value = $this->{$field};
            }

            return [$field => $value];
        });
    }
}