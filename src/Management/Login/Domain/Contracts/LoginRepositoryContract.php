<?php

namespace Src\Management\Login\Domain\Contracts;

use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginAuthication;

interface LoginRepositoryContract
{
    /**
     * @param LoginAuthication $loginAuthication
     * @return Login
     */
    public function login(LoginAuthication $loginAuthication): Login;
}
