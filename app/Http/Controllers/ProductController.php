<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'hasAccess:admin'])->only(['store', 'update', 'destroy']);
    }

    public function index()
    {
        $products = Product::query()->simplePaginate(20);
        return $products->toArray();
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::query()->create($request->validated());
        return $product->toArray();
    }

    public function show(Product $product)
    {
        return $product->toArray();
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return $product->toArray();
    }

    public function destroy(Product $product)
    {
        return response()->json([$product->delete()]);
    }
}
