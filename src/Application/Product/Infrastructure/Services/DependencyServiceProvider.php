<?php

namespace Src\Application\Product\Infrastructure\Services;

use \Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                'useCase' => [\Src\Application\Product\Application\Get\ProductIndexUseCase::class],
                'contract' => \Src\Application\Product\Domain\Contracts\ProductsRepositoryContract::class,
                'repository' => \Src\Application\Product\Infrastructure\Repositories\Eloquent\ProductRepository::class
            ],
        ]);
        parent::__construct($app);
    }
}
