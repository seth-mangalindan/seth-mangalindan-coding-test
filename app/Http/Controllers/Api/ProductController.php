<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function index()
    {

        $cacheKey = 'products';

        if (Cache::has($cacheKey)) {
            $products = Cache::get($cacheKey);
        } else {

            $products = Product::all();


            Cache::put($cacheKey, $products, 5);
        }
        return view('products', ['products' => $products]);
    }
    public function store(ProductRequest $request)
    {

        $product = Product::create($request->all());


        return new ProductResource($product);
    }
    public function update(Product $product, ProductRequest $request)
    {
        $product->update($request->all());

        return new ProductResource($product);
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
