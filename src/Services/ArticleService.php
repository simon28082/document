<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/31
 * Time: 16:52
 * Created by PhpStorm.
 */

namespace CrCms\Document\Services;

use CrCms\Foundation\App\Repositories\AbstractRepository;

class ArticleService implements DocumentContract
{
    public function index()
    {
        return  "a";
    }


    public function repository(AbstractRepository $repository)
    {
        $repository->getModel()->setTable('article');
    }
}
