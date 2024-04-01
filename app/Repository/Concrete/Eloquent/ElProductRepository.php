<?php

namespace App\Repository\Concrete\Eloquent;

use App\Models\Product;
use App\Repository\Interface\IProductRepository;

class ElProductRepository implements IProductRepository
{

    public function all()
    {
        return Product::all();
    }

    public function findById(int $id)
    {
        return Product::find($id);
    }
}
