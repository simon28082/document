<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/20
 * Time: 10:01
 * Created by PhpStorm.
 */
namespace CrCms\Document\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use CrCms\Document\Http\Requests\DefaultRequest;
use CrCms\Document\Repositories\ModelRepository;
use CrCms\Document\Repositories\ContentRepository;
use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Document\Http\Response\Response;

class DefaultController extends Controller
{
    public function __construct(ContentRepository $repository, Response $response)
    {
        $this->repository = $repository;
        $this->response    = $response;
    }

    public function index(Request $request,$version)
    {
        //echo "avc";
        //return ['ni'=>12];
        return $version;
    }
}