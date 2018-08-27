<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-08-01 18:39
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Http\Controllers\Api\Manage;

use CrCms\Document\Http\Resources\DefaultResource;
use CrCms\Document\Services\DocumentContract;
use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Http\Request;

/**
 * Class ContentController
 * @package CrCms\Mall\Http\Controllers\Api\Manage
 */
class ContentController extends Controller
{
    protected $service;

    public function __construct(DocumentContract $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $models = $this->service->index($request);
        //....
        return $this->response->collection($this->service->resource($models),Resource::class);
    }

    public function store(Request $request)
    {
        $model = $this->service->store($request);

        return $this->response->resource($this->service->resource($model), Resource::class);
    }

    public function update(Request $request, string $id)
    {
        $model = $this->service->update($request, $id);

        return $this->response->resource($this->service->resource($model), Resource::class);
    }

    public function destroy(Request $request, string $id)
    {
        $rows = $this->service->destroy($request, $id);

        return $this->response->noContent();
    }

}