<?php

namespace CrCms\Document\Providers;

//use Route;
//use CrCms\Document\Services\ArticleService;
use CrCms\Foundation\App\Providers\ModuleServiceProvider;
use CrCms\Document\Services\DocumentContract;
use CrCms\Foundation\App\Repositories\AbstractRepository;

/**
 * Class DocumentServiceProvider
 * @package CrCms\Document\Providers
 */
class DocumentServiceProvider extends ModuleServiceProvider
{
    /**
     * @var string
     */
    protected $basePath = __DIR__ . '/../../';

    /**
     * @var string
     */
    protected $name = 'document';

    /**
     * $type 是用户传递过的要使用的服务
     * 分别绑定 Service 和 Repository
     */
    public function boot(): void
    {
        // 全局路由规则
        \Route::pattern('version', '^v\d*?');

        parent::boot();

        $this->publishes([
            $this->basePath . 'config/config.php' => config_path("{$this->name}.php"),
            $this->basePath . 'resources/lang' => resource_path("lang/vendor/{$this->name}"),
        ]);

        $type = ucfirst(strtolower(trim($this->app->request->type)));

        $this->app->bind(DocumentContract::class, function($app) use ($type){
            $class = '\\CrCms\\Document\\Services\\'.$type.'Service';
            return new $class();
        });

        $this->loadViewsFrom($this->basePath.'resources/views',$this->name);
    }

    /**
     * @return void
     */
    protected function repositoryListener(): void
    {
    }
}