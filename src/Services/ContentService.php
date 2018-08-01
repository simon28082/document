<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/8/1
 * Time: 14:39
 * Created by PhpStorm.
 */

namespace CrCms\Document\Services;

use CrCms\Foundation\App\Repositories\AbstractRepository;
use CrCms\Document\Http\Requests\Content\IndexRequest;

class ContentService implements DocumentContract
{
    public function index()
    {
        $request = (new IndexRequest())->getValidatorInstance();
        return  "a";
    }


    public function repository(AbstractRepository $repository)
    {
        $repository->getModel()->setTable('article');
    }


}