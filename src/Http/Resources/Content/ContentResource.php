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

class ContentResource extends Resource
{


    public function toArray($request)
    {

        return [
            'id' => $this->_id,
            'title' => $this->title,
            'body' => $this->body,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString()
        ];
    }
}