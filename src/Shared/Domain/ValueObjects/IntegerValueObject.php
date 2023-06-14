<?php

namespace Src\Shared\Domain\ValueObjects;

abstract class IntegerValueObject
{
    /**
     * @param int $value
     */
    public function __construct(private int $value){}

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}
