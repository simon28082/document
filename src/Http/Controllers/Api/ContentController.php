<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/16
 * Time: 17:14
 * Created by PhpStorm.
 * +++++++++++++++++++++++++文档的CRUD+++++++++++++++++++++++++++++++++++++
 */

namespace CrCms\Document\Http\Controllers\Api;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use CrCms\Document\Http\Requests\ContentRequest;
use CrCms\Document\Repositories\ContentRepository;
use CrCms\Document\Http\Response\Response;
use CrCms\Foundation\App\Http\Controllers\Controller;
use DB;

class ContentController extends Controller
{
    public function __construct(ContentRepository $repository, Response $response)
    {
        $this->repository = $repository;
        $this->response    = $response;
    }

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        return $this->repository->get();

    }

    /**
     * @param ContentRequest $request
     */
    public function store(ContentRequest $request)
    {
        $this->repository->create($request->all());
        return $this->response->created();
    }
}