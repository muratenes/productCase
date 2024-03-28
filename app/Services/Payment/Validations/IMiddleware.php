<?php

namespace App\Services\Payment\Validations;


use App\Services\Payment\Models\PaymentData;

interface IMiddleware
{
    public function check(PaymentData $bookingData);
}
