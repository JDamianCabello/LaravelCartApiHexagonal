<?php

namespace Src\API\Payment\CartCheckout\Infrastructure\Services;

use Src\API\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                'useCase' => [\Src\API\Payment\CartCheckout\Application\Checkout\CheckoutUseCase::class],
                'contract' => \Src\API\Payment\CartCheckout\Domain\Contracts\CheckoutContract::class,
                'repository' => \Src\API\Payment\CartCheckout\Infrastructure\Repositories\Eloquent\CartCheckoutRepository::class
            ],
        ]);
        parent::__construct($app);
    }
}
