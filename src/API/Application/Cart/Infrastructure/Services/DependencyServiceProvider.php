<?php

namespace Src\API\Application\Cart\Infrastructure\Services;

use Src\API\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                'useCase' => [\Src\API\Application\Cart\Application\Auth\RequestGetUserDataUseCase::class],
                'contract' => \Src\API\Application\Cart\Domain\Contracts\RequestRepositoryContract::class,
                'repository' => \Src\API\Application\Cart\Infrastructure\Repositories\FirebaseJwt\RequestRepository::class
            ],
            [
                'useCase' => [
                    \Src\API\Application\Cart\Application\Get\FindUserCartUseCase::class,
                    \Src\API\Application\Cart\Application\Store\StoreCartItemUseCase::class,
                ],
                'contract' => \Src\API\Application\Cart\Domain\Contracts\CartRepositoryContract::class,
                'repository' => \Src\API\Application\Cart\Infrastructure\Repositories\Eloquent\CartRepository::class
            ],
        ]);
        parent::__construct($app);
    }
}
