<?php

namespace CrCms\Document\Providers;

use CrCms\Foundation\App\Providers\ModuleServiceProvider;

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
     *
     */
    public function boot(): void
    {
        parent::boot();

        $this->publishes([
            $this->basePath . 'config/config.php' => config_path("{$this->name}.php"),
            $this->basePath . 'resources/lang' => resource_path("lang/vendor/{$this->name}"),
        ]);
    }

    /**
     * @return void
     */
    protected function repositoryListener(): void
    {
    }
}