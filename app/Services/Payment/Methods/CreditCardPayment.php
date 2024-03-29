<?php

namespace App\Services\Payment\Methods;

use App\Services\Payment\Models\PaymentData;

class CreditCardPayment implements IPayment
{

    public function pay(PaymentData $paymentData) : bool
    {
        // implement credit_card logic

        return true;
    }
}
