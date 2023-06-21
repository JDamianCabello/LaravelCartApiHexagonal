<?php

namespace Src\API\Application\Cart\Domain\Contracts;

use Src\API\Application\Cart\Domain\ValueObjects\RequestJwt;

interface RequestRepositoryContract
{
    public function getJwtDecodedData(RequestJwt $jwt): array;
}
