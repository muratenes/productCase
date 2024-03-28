<?php

namespace App\Services\Order;

use App\Models\Product;
use App\Models\User;

class OrderWrapper
{
    public function create(Product $product, User $user)
    {
        // log to mongo
    }
}
