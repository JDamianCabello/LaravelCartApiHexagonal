<?php

namespace Src\API\Management\Login\Domain;

use Src\API\Shared\Domain\Domain;
use Src\API\Shared\Domain\Helper\HttpCodesDomainHelper;
use Src\API\Management\Login\Domain\Exceptions\NotLoginException;

final class Login extends Domain
{

    use HttpCodesDomainHelper;

    private const USER_OR_PASSWORD_INCORRECT = 'USER_OR_PASSWORD_INCORRECT';

    /**
     * @return array
     */
    public function handler(): array{
        return [
            'id' => $this->entity()['id'],
            'username' => $this->entity()['username'],
            'email' => $this->entity()['email']
        ];
    }

    /**
     * @param string|null $exception
     * @return void
     * @throws NotLoginException
     */
    protected function isException(?string $exception): void
    {
        if(!is_null($exception)){
            match ($exception){
                self::USER_OR_PASSWORD_INCORRECT => throw new NotLoginException("email or password incorrect", $this->badRequest())
            };
        }
    }
}
