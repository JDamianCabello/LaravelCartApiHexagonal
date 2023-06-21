<?php

namespace Src\API\Management\Login\Infrastructure\Services;

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
            'api/' . $appVersion . '/login',
            'Src\API\Management\Login\Infrastructure\Controllers',
            'Src/API/Management/Login/Infrastructure/Routes/Api.php',
            true
        );
        parent::__construct($app);
    }
}
