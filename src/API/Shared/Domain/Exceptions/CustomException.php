<?php

namespace Src\API\Shared\Domain\Exceptions;
use Exception;

abstract class CustomException extends Exception
{
    public function toException(): array{
        $classFullName = new \ReflectionClass(get_class($this));
        $class = explode('\\', $classFullName->getName());

        return [
          'status' => $this->getCode(),
          'error' => true,
          'class' => end($class),
          'message' => $this->getMessage()
        ];
    }
}
