<?php

namespace Src\API\Management\Login\Domain\ValueObjects;

use Src\API\Shared\Domain\ValueObjects\StringValueObject;

final class LoginJWT extends StringValueObject
{
    /**
     * @return string
     */
    public function jwtKey(): string
    {
        return env('JWT_KEY');
    }

    /**
     * @return string
     */
    public function jwtEncrypt():string
    {
        return env('JWT_ENCRYPT');
    }
}
