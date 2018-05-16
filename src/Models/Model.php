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

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * @var string
     */
    protected $primaryKey = '_id';

    /**
     * @var string
     */
    protected $keyType = 'string';
}