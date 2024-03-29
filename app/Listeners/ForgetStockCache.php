<?php

namespace App\Listeners;

use App\Events\ProductPurchaseEvent;
use App\Services\Payment\Validations\ProductInStock;
use Illuminate\Support\Facades\Redis;

class ForgetStockCache
{

    /**
     * Handle the event.
     */
    public function handle(ProductPurchaseEvent $event): void
    {
        Redis::del(ProductInStock::getProductCacheKey($event->paymentData,$event->paymentData->getUser()->id));
    }
}
