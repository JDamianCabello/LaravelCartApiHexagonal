<?php

namespace Src\Management\Login\Application\Login;

use Src\Management\Login\Application\Auth\LoginAutenticationUseCase;
use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginAuthication;

final class LoginAuthUseCase
{
    /**
     * @param LoginRepositoryContract $loginRepositoryContract
     * @param LoginAutenticationUseCase $autenticationUseCase
     */
    public function __construct(
        private readonly LoginRepositoryContract $loginRepositoryContract,
        private readonly LoginAutenticationUseCase $autenticationUseCase)
    {
    }

    /**
     * @param array $request
     * @return Login
     */
    public function __invoke(array $request): Login
    {
        $login = $this->loginRepositoryContract->login(new LoginAuthication($request));

        return new Login(array_merge($login->handler(), [
            'jwt' => $this->autenticationUseCase->__invoke($login->handler())
        ]));
    }
}
