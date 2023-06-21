<?php

namespace Src\API\Management\Login\Infrastructure\Repositories\Eloquent;


use Src\API\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\API\Management\Login\Domain\Login;
use Src\API\Management\Login\Domain\ValueObjects\LoginAuthication;

final class LoginRepository implements LoginRepositoryContract
{
    /**
     * @var User
     */
    private User $user;

    /**
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->user = $userModel;
    }

    /**
     * @param LoginAuthication $loginAuthication
     * @return Login
     */
    public function login(LoginAuthication $loginAuthication): Login
    {
        $user = $this->userByEmail($loginAuthication->value()['email']);
        if(!$user){
            return new Login(null, 'USER_OR_PASSWORD_INCORRECT');
        }

        $check = $loginAuthication->checkPassword($loginAuthication->value()['password'], $user["password"]);

        if(!$check){
            return new Login(null, 'USER_OR_PASSWORD_INCORRECT');
        }

        return new Login($user);
    }

    /**
     * @param string $email
     * @return array|null
     */
    private function userByEmail(string $email): ?array{
        $user = $this->user->where('email', $email)->select('id', 'email', 'username', 'password')->first();
        return $user?->makeVisible('password')->toArray();
    }
}
