<?php

namespace Src\API\Application\Cart\Application\Auth;

use Src\API\Application\Cart\Domain\Contracts\RequestRepositoryContract;
use Src\API\Application\Cart\Domain\ValueObjects\RequestJwt;

class RequestGetUserDataUseCase
{
    public function __construct(
        private readonly RequestRepositoryContract $requestRepositoryContract
    )
    {
    }

    public function __invoke(RequestJwt $jwt)
    {
        return $this->requestRepositoryContract->getJwtDecodedData($jwt);
    }
}
