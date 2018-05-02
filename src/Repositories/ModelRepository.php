<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 13:16
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Repositories;

use CrCms\Document\Models\Model;
use CrCms\Foundation\App\Repositories\AbstractRepository;

/**
 * Class ModelRepository
 * @package CrCms\Document\Repositories
 */
class ModelRepository extends AbstractRepository
{
    /**
     * @return Model
     */
    public function newModel(): Model
    {
        return app(Model::class);
    }
}