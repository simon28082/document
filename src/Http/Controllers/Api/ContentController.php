<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/16
 * Time: 17:14
 * Created by PhpStorm.
 * +++++++++++++++++++++++++文档的CRUD+++++++++++++++++++++++++++++++++++++
 */

namespace CrCms\Document\Http\Controllers\Api;

use CrCms\Document\Http\Resources\Content\ContentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, string $version): JsonResponse
    {
        $models = $this->service->index($request);
        
        $models || abort(400, 'Result is not exists!');

        return $this->response()->collection(collect($this->service->resource($models)),ContentResource::class);

    }

    /**
     * @param Request $request
     * @param string $version
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, string $version)
    {
        $this->service->store($request);


        return $this->response()->created();
    }

    /**
     * @param Request $request
     * @param string $version
     * @param string $id
     * @return JsonResponse
     */
    public function show(Request $request, string $version, string $id): JsonResponse
    {
        $model = $this->service->show($request, $id);

        $model || abort(400, 'Result is not exists!');

        return $this->response()->resource($model,ContentResource::class);
    }

    /**
     * @param Request $request
     * @param string $version
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $version, string $id)
    {
        $model = $this->service->update($request, $id);

        return $this->response()->created();
    }

    /**
     * @param Request $request
     * @param string $version
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, string $version, string $id)
    {
        $this->service->destroy($request, $id);

        return $this->response()->noContent();
    }



}