<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 12:55
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Http\Controllers\Api\Manage;

use CrCms\Document\Http\Requests\Model\StoreRequest;
use CrCms\Document\Models\Model;
use CrCms\Document\Repositories\ModelRepository;
use CrCms\Document\Services\Documents\Form;
use CrCms\Foundation\App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class ModelController
 * @package CrCms\Document\Http\Controllers\Api\Manage
 */
class ModelController extends Controller
{

    public function __construct(ModelRepository $repository)
    {
        $this->repository = $repository;
    }


    public function store(StoreRequest $request)
    {
        $model = $this->repository->create($request->all());


    }

}