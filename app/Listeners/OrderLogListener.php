<?php

namespace App\Listeners;

use App\Events\ProductPurchaseEvent;
use App\Models\Order;

class OrderLogListener
{


    /**
     * Handle the event.
     */
    public function handle(ProductPurchaseEvent $event): void
    {
        Order::create([
            'product_id' => $event->paymentData->getProduct()->id,
            'address_id' => $event->paymentData->getAddress()->id,
            'user_id' => $event->paymentData->getUser()->id,
            'quantity' => $event->paymentData->getQuantity(),
            'extra' => $event->paymentData->getExtra(),
        ]);
    }
}
