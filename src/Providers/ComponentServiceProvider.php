<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:11
 */

namespace CrCms\Document\Providers;


use CrCms\Document\Repositories\DocumentRepository;
use CrCms\Document\Repositories\Interfaces\DocumentRepositoryInterface;
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
        $this->app->bind(DocumentRepositoryInterface::class,DocumentRepository::class);
    }


    /**
     * @return array
     */
    public function provides()
    {
        return [
            DocumentRepositoryInterface::class,
        ];
    }

}