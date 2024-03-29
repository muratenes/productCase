<?php

namespace App\Services\Payment\Methods;

use App\Services\Payment\Models\PaymentData;

interface IPayment
{
    public function pay(PaymentData $paymentData): bool;
}
