<?php

namespace Src\Shared\Domain;

abstract class Domain
{
    /**
     * @param mixed|null $entity
     * @param string|null $exception
     */
    public function __construct(
        private mixed $entity = null,
        private readonly ?string $exception = null){
        $this->exception($this->exception);
    }

    /**
     * @return mixed
     */
    public function entity(): mixed{
        return $this->entity;
    }

    /**
     * @param string|null $exeption
     * @return never
     */
    protected abstract function isException(?string $exeption): never;
}
