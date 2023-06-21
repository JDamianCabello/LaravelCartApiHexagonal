<?php

namespace Src\API\Application\Cart\Infrastructure\Services;

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
            'api/' . $appVersion . '/cart',
            'Src\API\Application\Cart\Infrastructure\Controllers',
            'Src/API/Application/Cart/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
