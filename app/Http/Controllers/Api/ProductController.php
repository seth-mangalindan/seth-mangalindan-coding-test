<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\ProductService;
use App\Http\Traits\Caching;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    use Caching;
    public function __construct(protected ProductService $productService){}
    public function index() : JsonResponse
    {
        $response = $this->productService->index();
        return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        $response = $this->productService->store($request->all());
        return response()->json($response, 201);        
    }
    public function update(Request $request, $id)
    {
        $response = $this->productService->update($request->all(), $id);
        return response()->json($response, 200);
    }
    public function destroy($id)
    {
        $this->productService->destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
