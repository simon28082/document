<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:11
 */

namespace CrCms\Document\Providers;


use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    public $defer = true;


    /**
     *
     */
    public function register()
    {
    }


    /**
     * @return array
     */
    public function provides()
    {
        return [
        ];
    }

}