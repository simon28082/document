<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/20
 * Time: 15:55
 * Created by PhpStorm.
 */

namespace CrCms\Document\Repositories;

use CrCms\Document\Models\Model;
use CrCms\Document\Models\ContentModel;
use CrCms\Foundation\App\Repositories\AbstractRepository;
//use CrCms\Repository\AbstractRepository;

class ContentRepository extends AbstractRepository
{
    protected $guard = [
        'title', 'body', 'category_id', 'user_id'
    ];


    public function newModel(): Model
    {
        return app()->make(ContentModel::class);
    }


}
