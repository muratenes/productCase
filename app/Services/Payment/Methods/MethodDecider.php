<?php

namespace App\Services\Payment\Methods;

class MethodDecider
{
    /**
     * @throws \Exception
     */
    public static function decide(string $type): IPayment
    {
        $method = match ($type) {
            'credit_card' => new CreditCardPayment(),
            'paypal' => new PaypalPayment(),
            default => null
        };

        if (!$method) {
            throw new \Exception("Invalid payment method type");

        }
        return $method;
    }
}
