<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/20
 * Time: 16:24
 * Created by PhpStorm.
 */
namespace CrCms\Document\Http\Response;

use Illuminate\Http\Response as BaseResponse;

class Response extends BaseResponse
{
    use RestResponseTrait;
}
