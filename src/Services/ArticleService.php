<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/31
 * Time: 16:52
 * Created by PhpStorm.
 */

namespace CrCms\Document\Services;

use CrCms\Document\Models\DefaultModel;
use CrCms\Foundation\App\Repositories\AbstractRepository;
use Illuminate\Http\Request;

class ArticleService implements DocumentContract
{
    public function index(Request $request)
    {

    }

    public function init()
    {
        // TODO: Implement init() method.
    }


    public function repository(AbstractRepository $repository)
    {
        $repository->getModel()->setTable('article');
    }

    public function destroy(Request $request, string $id): int
    {
    }

    public function store(Request $request): DefaultModel
    {
    }

    public function update(Request $request, string $id): DefaultModel
    {
    }
}
