<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:35
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class DocumentModel
 * @package CrCms\Modules\document\src\Models
 */
class DocumentModel extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $primaryKey = '_id';

    protected $keyType = 'string';

    protected $connection = 'mongodb';

    protected $guarded = [];

//    public function setCollection(string $collection): self
//    {
//        $this->collection = $collection;
//        return $this;
//    }
}