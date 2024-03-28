<?php

namespace App\Services\Payment\Validations;


use App\Services\Payment\Models\PaymentData;

abstract class Middleware implements IMiddleware
{
    protected ?IMiddleware $next = null;

    public function setNext(IMiddleware $middleware)
    {
        $this->next = $middleware;

        return $middleware;
    }


    public function check(PaymentData $paymentData)
    {
        if (!$this->next) {
            return null;
        }
        return $this->next->check($paymentData);
    }
}
