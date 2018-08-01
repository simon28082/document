<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/8/1
 * Time: 14:39
 * Created by PhpStorm.
 */

namespace CrCms\Document\Services;

use CrCms\Document\Models\DefaultModel;
use CrCms\Document\Repositories\ContentRepository;
use CrCms\Foundation\App\Repositories\AbstractRepository;
use CrCms\Document\Http\Requests\Content\IndexRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ContentService implements DocumentContract
{
    use ValidatesRequests;

    protected $repository;

    public function __construct(ContentRepository $repository)
    {
        $this->repository = $repository;
    }

//    public function index()
//    {
//        $request = (new IndexRequest())->getValidatorInstance();
//        return  "a";
//    }
//
//
//    public function repository(AbstractRepository $repository)
//    {
//        $repository->getModel()->setTable('article');
//    }
    public function index(Request $request)
    {
        $this->validate($request,[
            'title' => ['required']
        ],[],[
            'title' => trans('document::app.title')
        ]);

        return $this->repository->paginate();
    }

    public function store(Request $request): DefaultModel
    {
        return $this->repository->setGuard(['title'])->create($request->all());
    }

    public function update(Request $request): DefaultModel
    {
        return $this->repository->setGuard(['title'])->update($request->all(),$request->route()->parameter('default'));
    }

    public function destroy(Request $request): int
    {
        return $this->repository->delete($request->route()->parameter('default'));
    }


}