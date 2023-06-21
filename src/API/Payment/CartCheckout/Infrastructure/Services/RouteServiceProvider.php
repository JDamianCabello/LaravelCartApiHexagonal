<?php

namespace Src\API\Payment\CartCheckout\Infrastructure\Services;

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
            'api/' . $appVersion . '/checkout',
            'Src\API\Payment\CartCheckout\Infrastructure\Controllers',
            'Src/API/Payment/CartCheckout/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
