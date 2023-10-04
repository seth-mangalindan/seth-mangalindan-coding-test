<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductService
{
    public function __construct(private ProductRepository $productRepository){}
    
    public function index() 
    {
        return $this->productRepository->index();
    }

    public function store($request = [])
    {
        $isValid = Validator::make($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|decimal:0,2'
        ]);

        if($isValid->fails())
        { 
            throw new ValidationException($isValid);
        }

         return $this->productRepository->store($request);
    }

    public function update($request = [], $id)
    {
        $isValid = Validator::make($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|decimal:0,2'
        ]);

        if($isValid->fails())
        { 
            throw new ValidationException($isValid);
        }

        return $this->productRepository->update($request, $id);
    }

    public function destroy($id)
    {
        $this->productRepository->destroy($id);
    }
}
