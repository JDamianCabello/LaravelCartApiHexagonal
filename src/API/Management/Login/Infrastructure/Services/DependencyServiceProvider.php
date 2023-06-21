<?php

namespace Src\API\Management\Login\Infrastructure\Services;

use Src\API\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                'useCase' => [\Src\API\Management\Login\Application\Login\LoginAuthUseCase::class],
                'contract' => \Src\API\Management\Login\Domain\Contracts\LoginRepositoryContract::class,
                'repository' => \Src\API\Management\Login\Infrastructure\Repositories\Eloquent\LoginRepository::class
            ],
            [
                'useCase' => [
                    \Src\API\Management\Login\Application\Auth\LoginAutenticationUseCase::class,
                    \Src\API\Management\Login\Application\Auth\LoginCheckAuthenticationUseCase::class,
                ],
                'contract' => \Src\API\Management\Login\Domain\Contracts\LoginAuthenticationContract::class,
                'repository' => \Src\API\Management\Login\Infrastructure\Repositories\FirebaseJwt\LoginAuthenticationRepository::class
            ],
        ]);
        parent::__construct($app);
    }
}
