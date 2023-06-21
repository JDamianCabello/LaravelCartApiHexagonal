<?php

namespace Src\API\Application\Cart\Infrastructure\Repositories\FirebaseJwt;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Src\API\Application\Cart\Domain\Contracts\RequestRepositoryContract;
use Src\API\Application\Cart\Domain\ValueObjects\RequestJwt;

class RequestRepository implements RequestRepositoryContract
{
    /**
     * @var JWT
     */
    private JWT $jwt;

    public function __construct()
    {
        $this->jwt = new JWT();
    }

    /**
     * @param RequestJwt $jwt
     * @return array
     */
    public function getJwtDecodedData(RequestJwt $jwt): array
    {
        return (array)$this->jwt::decode(
            $jwt->value(),
            new Key($jwt->jwtKey(), $jwt->jwtEncrypt())
        );
    }
}
