<?php

namespace Src\Management\Login\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\MixedValueObject;

final class LoginAuthication extends MixedValueObject
{
    /**
     * @param string $requestPassword
     * @param string $password
     * @return bool
     */
    public function checkPassword(string $requestPassword, string $password): bool{
        return password_verify($requestPassword, $password);
    }
}
