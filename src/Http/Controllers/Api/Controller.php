<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/31
 * Time: 22:48
 * Created by PhpStorm.
 */

namespace CrCms\Document\Http\Controllers\Api;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use CrCms\Document\Http\Requests\Content\StoreRequest;
use CrCms\Document\Http\Requests\Content\IndexRequest;
use CrCms\Document\Repositories\ContentRepository;
use CrCms\Document\Http\Response\Response;
use CrCms\Foundation\App\Http\Controllers\Controller as BaseController;
use CrCms\Document\Services\DocumentContract;
use CrCms\Foundation\App\Repositories\AbstractRepository;

class Controller extends BaseController
{
    private $services;
    private $repository;

    public function __construct(DocumentContract $contract, AbstractRepository $repository)
    {
        $this->services   = $contract;
        $this->repository = $repository;
        $this->services->repository($this->repository);
    }

    /**
     * @param Request $request
     */
    public function index()
    {
        return $this->services->index();
    }
}