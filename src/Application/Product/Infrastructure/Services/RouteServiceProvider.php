<?php

namespace Src\Application\Product\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouterServiceProvider as ServiceProvider;

final class RouteServiceProvider extends ServiceProvider
{
    /**
     * @param $app
     */
    public function __construct($app)
    {
        $appVersion = env("APP_VERSION");

        $this->setDependency(
            'api/' . $appVersion . '/products',
            'Src\Application\Product\Infrastructure\Controllers',
            'Src/Application/Product/Infrastructure/Routes/Api.php',
            true
        );
        parent::__construct($app);
    }
}
