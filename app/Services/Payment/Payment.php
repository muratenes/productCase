<?php

namespace App\Services\Payment;

use App\Events\ProductPurchaseEvent;
use App\Exceptions\ValidationException;
use App\Models\Order;
use App\Services\Payment\Methods\MethodDecider;
use App\Services\Payment\Models\PaymentData;
use App\Services\Payment\Models\Result;
use App\Services\Payment\Validations\ProductInStock;
use Illuminate\Support\Facades\DB;

class Payment
{
    /**
     * @throws ValidationException
     * @throws \Exception
     */
    public function pay(PaymentData $paymentData): Result
    {
        DB::beginTransaction();
        $result = new Result();

        try {
            $paymentData = (new ProductInStock())->check($paymentData);
            $paymentMethod = MethodDecider::decide($paymentData->getPaymentMethod());
            $paymentStatus = $paymentMethod->pay($paymentData);

            if ($paymentStatus !== true) {
                return $result;
            }

            $paymentData->getProduct()->sharedLock()->decrement('stock');
            ProductPurchaseEvent::dispatch($paymentData);
            $result->setSuccess(true)->setPaymentData($paymentData);
            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            // log some failed transactions
            throw $exception;
        }

        return $result;
    }
}
