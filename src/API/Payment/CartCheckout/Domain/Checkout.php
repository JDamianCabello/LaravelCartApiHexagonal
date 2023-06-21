<?php

namespace Src\API\Payment\CartCheckout\Domain;

class Checkout extends \Src\API\Shared\Domain\Domain
{
    public bool $payed;

    /**
     * @return void
     */
    public function __invoke()
    {
        $this->payed = false;
    }

    /**
     * @return array
     */
    public function handler(): array{
        return [
            "payed" => $this->payed,
            "payed_at" => date("Y-m-d H:i:s"),
            "order_id" => uniqid(),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function isException(?string $exception): void
    {
        // TODO: Implement isException() method.
    }
}
