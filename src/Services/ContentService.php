<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/8/1
 * Time: 14:39
 * Created by PhpStorm.
 */

namespace CrCms\Document\Services;

use CrCms\Document\Http\Resources\Content\ContentIndexResource;
use CrCms\Document\Http\Resources\DefaultResource;
use CrCms\Document\Models\DefaultModel;
use CrCms\Document\Repositories\ContentRepository;
use CrCms\Foundation\App\Http\Resources\Resource;
use CrCms\Foundation\App\Repositories\AbstractRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ContentService implements DocumentContract
{
    use ValidatesRequests;

    protected $repository;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->repository = new ContentRepository();
    }

    public function index(Request $request)
    {
        $this->request = $request;
        return $this->repository->paginate();
    }

    public function store(Request $request): DefaultModel
    {

        return $this->repository->setGuard(['title'])->create($request->all());
    }

    public function update(Request $request, string $id): DefaultModel
    {
        $model = $this->repository->setGuard(['title'])->update($request->all(), $request->route()->parameter('default'));

        return $model;
    }

    public function destroy(Request $request, string $id): int
    {
        return $this->repository->delete($request->route()->parameter('default'));
    }


    public function resource($resource)
    {
        if ($resource instanceof Paginator) {

            $res = [];
            foreach ($resource->items() as $key => $value) {
                $res[] = (new ContentIndexResource($resource, $value));

            }
            $data = collect($res);
        } else {
            //一堆格式化处理
            $data = collect($resource);
        }

        return $data;
    }

}