<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-05-01 12:56
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Models;

use Jenssegers\Mongodb\Eloquent\Model as BaseModel;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class FieldModel
 * @package CrCms\Document\Models
 */
class Model extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $connection = 'mongodb';

    protected $primaryKey = '_id';

    protected $keyType = 'string';
}