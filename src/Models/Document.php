<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 13:55
 */

namespace CrCms\Document\Models;


use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Document extends Model
{

    use SoftDeletes;

    protected $collection = 'documents';

}