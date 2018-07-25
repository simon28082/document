<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/20
 * Time: 11:26
 * Created by PhpStorm.
 */

namespace CrCms\Document\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DefaultResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [];
    }
}