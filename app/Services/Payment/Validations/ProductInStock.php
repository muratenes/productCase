<?php

namespace App\Services\Payment\Validations;

use App\Exceptions\ValidationException;
use App\Models\Product;
use App\Services\Payment\Models\PaymentData;
use Illuminate\Support\Facades\Redis;

class ProductInStock extends Middleware
{
    const PRODUCT_IN_STOCK_FORMAT = "products:%s:allocate:controller:user:%s";
    const EXPIRE_TIME = 30;

    public function check(PaymentData $paymentData)
    {
        $paymentData->setProduct(
            Product::lockForUpdate()->find($paymentData->getExtra("product_id"))
        );

        $productAllocateKey = self::getProductCacheKey($paymentData, $paymentData->getUser()->id);
        $allocatedProductCount = count(Redis::keys(
            sprintf(self::PRODUCT_IN_STOCK_FORMAT, $paymentData->getProduct()->id, "*")
        ));

        if ($paymentData->getQuantity() > ($paymentData->getProduct()->stock - $allocatedProductCount)) {
            throw new ValidationException("There is no stock for this product.");
        }

        Redis::set($productAllocateKey, 1);
        Redis::expire($productAllocateKey, self::EXPIRE_TIME);

        return $paymentData;
    }


    public static function getProductCacheKey(PaymentData $paymentData, string $userKey = '*'): string
    {
        return sprintf(self::PRODUCT_IN_STOCK_FORMAT, $paymentData->getProduct()->id, $userKey);
    }
}
