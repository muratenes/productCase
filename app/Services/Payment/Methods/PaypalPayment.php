<?php

namespace App\Services\Payment\Methods;

use App\Services\Payment\Models\PaymentData;

class PaypalPayment implements IPayment
{

    public function pay(PaymentData $paymentData): bool
    {
        // implement paypal method
        return  true;
    }
}
