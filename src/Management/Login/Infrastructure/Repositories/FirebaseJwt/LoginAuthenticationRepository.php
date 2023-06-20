<?php

namespace Src\Management\Login\Infrastructure\Repositories\FirebaseJwt;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObjects\LoginAutenticationParameters;
use Src\Management\Login\Domain\ValueObjects\LoginJWT;

final class LoginAuthenticationRepository implements LoginAuthenticationContract
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
     * @param LoginAutenticationParameters $loginAutenticationParameters
     * @return string
     */
    public function auth(LoginAutenticationParameters $loginAutenticationParameters): string
    {
        return $this->jwt::encode(
            [
                $loginAutenticationParameters->handler()
            ],
            $loginAutenticationParameters->jwtKey(),
            $loginAutenticationParameters->jwtKEncrypt()
        );
    }

    /**
     * @param LoginJWT $loginJWT
     * @return bool
     */
    public function check(LoginJWT $loginJWT): bool
    {
        try {
            $decode = (array)$this->jwt::decode(
                $loginJWT->value(),
                new Key($loginJWT->jwtKey(), $loginJWT->jwtEncrypt())
            );


            if(time() > $decode[0]->exp){
                return false;
            }
        }catch (\Exception){
            return false;
        }

        return true;
    }
}
