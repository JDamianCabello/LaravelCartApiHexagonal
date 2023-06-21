<?php

namespace Src\API\Application\Product\Infrastructure\Services;

use Src\API\Shared\Infrastructure\Services\RouterServiceProvider as ServiceProvider;

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
            'Src\API\Application\Product\Infrastructure\Controllers',
            'Src/API/Application/Product/Infrastructure/Routes/Api.php',
            true
        );
        parent::__construct($app);
    }
}
