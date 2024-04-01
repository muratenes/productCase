<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repository\Interface\IProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private readonly IProductRepository $productRepository)
    {

    }

    public function index()
    {
        $products = $this->productRepository->all();

        return new ProductCollection($products);
    }

    public function show(int $id)
    {
        $product = $this->productRepository->findById($id);
        return new ProductResource($product);
    }
}
