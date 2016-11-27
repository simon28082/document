<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 13:55
 */

namespace CrCms\Document\Models;


use CrCms\Kernel\Models\MongoModel;
use CrCms\Kernel\Models\Traits\MongoSoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Document extends MongoModel
{

    use SoftDeletes;

    /**
     * @var string
     */
//    protected $collection = 'documents';

    /**
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * 不允许写入的字段，默认解除禁止
     * @var array
     */
    protected $guarded = [];


    /**
     * Document constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->collection = app(config('document.form_drive'))->table();
        parent::__construct($attributes);
    }

}