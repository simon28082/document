<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/8/1
 * Time: 14:39
 * Created by PhpStorm.
 */

namespace CrCms\Document\Services;

use CrCms\Document\Http\Resources\Content\ContentResource;
use CrCms\Document\Http\Resources\DefaultResource;
use CrCms\Document\Models\ContentModel;
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

    public function show(Request $request, string $id)
    {
        return $this->repository->getModel()->find($id);
    }

    public function store(Request $request): ContentModel
    {

        $rules = [
            'title' => ['required', 'min:2', 'max:32'],
            'body' => ['required', 'min:2' ]
        ];
        $attributes = [
            'title' => trans("document::app.validate.title"),
            'body' => trans("document::app.validate.body")
        ];
        //dd($request->all());
        $this->validate($request, $rules, [], $attributes);

        return $this->repository->create($request->all());
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => ['required', 'min:2', 'max:32'],
            'body' => ['required', 'min:2' ]
        ];
        $attributes = [
            'title' => trans("document::app.validate.title"),
            'body' => trans("document::app.validate.body")
        ];

        $this->validate($request, $rules, [], $attributes);

        $model = $this->repository->update($request->all(), $id);

        return $model;
    }

    public function destroy(Request $request, string $id): int
    {
        return $this->repository->delete($id);
    }


    public function resource($resource)
    {
        if ($resource instanceof Paginator) {
            $data = $resource->items();
        } else {
            //一堆格式化处理
            $data = collect($resource);
        }

        return $data;
    }

}