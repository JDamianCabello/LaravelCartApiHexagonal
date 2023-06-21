<?php

namespace Src\API\Application\Product\Infrastructure\Services;

use Src\API\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                'useCase' => [\Src\API\Application\Product\Application\Get\ProductIndexUseCase::class],
                'contract' => \Src\API\Application\Product\Domain\Contracts\ProductsRepositoryContract::class,
                'repository' => \Src\API\Application\Product\Infrastructure\Repositories\Eloquent\ProductRepository::class
            ],
        ]);
        parent::__construct($app);
    }
}
