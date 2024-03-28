<?php

namespace App\Services\Payment\Validations;

use App\Exceptions\ValidationException;
use App\Models\Product;
use App\Services\Payment\Models\PaymentData;
use Illuminate\Support\Facades\Redis;

class ProductInStock extends Middleware
{
    public function check(PaymentData $paymentData)
    {
        $soldCount = Redis::get('product:stock:' . $paymentData->getProduct()->id) ?? 0;

        if ($paymentData->getQuantity() > ($paymentData->getProduct()->quantity - $soldCount)) {
            throw new ValidationException("There is no stock for this product.");
        }

        return $paymentData;
    }
}
