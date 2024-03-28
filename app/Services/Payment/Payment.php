<?php

namespace App\Services\Payment;

use App\Exceptions\ValidationException;
use App\Services\Payment\Models\PaymentData;
use App\Services\Payment\Validations\ProductInStock;

class Payment
{
    /**
     * @throws ValidationException
     */
    public function pay(PaymentData $paymentData)
    {
        $paymentData = (new ProductInStock())->check($paymentData);
        // validation -> stock,price,isActive

        // decide payment method type

        // create order.

    }
}
