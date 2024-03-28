<?php

namespace App\Exceptions;

use Throwable;

class ValidationException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, \Illuminate\Http\Response::HTTP_NOT_ACCEPTABLE, $previous);
    }
}
