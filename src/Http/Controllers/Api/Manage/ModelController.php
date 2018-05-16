<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 12:55
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Http\Controllers\Api\Manage;

use CrCms\Document\Http\Requests\Model\StoreRequest;
use CrCms\Document\Http\Requests\Model\UpdateRequest;
use CrCms\Document\Http\Resources\ModelResource;
use CrCms\Document\Repositories\ModelRepository;
use CrCms\Foundation\App\Http\Controllers\Controller;

/**
 * Class ModelController
 * @package CrCms\Document\Http\Controllers\Api\Manage
 */
class ModelController extends Controller
{
    /**
     * ModelController constructor.
     * @param ModelRepository $repository
     */
    public function __construct(ModelRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $models = $this->repository->all();
        return $this->response->collection($models, ModelResource::class);
    }

    /**
     * @param StoreRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(StoreRequest $request)
    {
        $model = $this->repository->create($request->all());
        return $this->response->resource($model, ModelResource::class);
    }

    /**
     * @param UpdateRequest $request
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(UpdateRequest $request, string $id)
    {
        $model = $this->repository->update($request->all(), $id);
        return $this->response->resource($model, ModelResource::class);
    }

    /**
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(string $id)
    {
        $row = $this->repository->delete($id);
        return $this->response->noContent();
    }
}