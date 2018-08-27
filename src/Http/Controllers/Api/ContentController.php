<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/16
 * Time: 17:14
 * Created by PhpStorm.
 * +++++++++++++++++++++++++文档的CRUD+++++++++++++++++++++++++++++++++++++
 */

namespace CrCms\Document\Http\Controllers\Api;

use CrCms\Document\Http\Resources\ContentIndexResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use CrCms\Document\Services\DocumentContract;
use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Foundation\App\Http\Resources\Resource;

class ContentController extends Controller
{
    // 服务--由DocumentContract对应不同的服务
    public $service;

    public function __construct(DocumentContract $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @param string $version
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, string $version)
    {
        $models = $this->service->index($request);
        return $this->response()->collection($this->service->resource($models),Resource::class);

    }
}