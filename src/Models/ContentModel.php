<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/20
 * Time: 14:51
 * Created by PhpStorm.
 */
namespace CrCms\Document\Models;

class ContentModel extends Model
{
    //protected $fillable = ['title', 'body', 'category_id', 'user_id'];
    protected $guarded = [];
    protected $collection = 'content';

}