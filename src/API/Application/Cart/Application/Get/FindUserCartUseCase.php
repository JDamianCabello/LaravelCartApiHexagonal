<?php

namespace Src\API\Application\Cart\Application\Get;

use Src\API\Application\Cart\Domain\Cart;
use Src\API\Application\Cart\Domain\Contracts\CartRepositoryContract;
use Src\API\Application\Cart\Domain\ValueObjects\UserID;

final class FindUserCartUseCase
{
    public function __construct(
        private readonly CartRepositoryContract $cartRepositoryContract
    )
    {
    }

    public function __invoke(UserID $userID, bool $withRelationships = false): Cart
    {
        return $this->cartRepositoryContract->getUserCart($userID, $withRelationships);
    }
}
