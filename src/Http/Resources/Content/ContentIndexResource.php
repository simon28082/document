<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/8/27
 * Time: 17:29
 * Created by PhpStorm.
 */

namespace CrCms\Document\Http\Resources\Content;

use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Support\Carbon;

class ContentIndexResource extends Resource
{
    protected $fields;

    public function __construct($resource, $fields)
    {
        parent::__construct($resource);
        $this->fields = $fields;
    }


    public function toArray($request)
    {
        return [
            'id' => $this->fields->_id,
            'title' => $this->fields->title,
            'content' => $this->fields->content,
            'category_id' => $this->fields->category_id,
            'user_id' => $this->fields->user_id,
            'created_at' => $this->fields->created_at->toDateTimeString(),
            'updated_at' => $this->fields->updated_at->toDateTimeString()
        ];
    }
}