<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\http\Request;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * 
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request): array
    {
        return [
        'id' => $this->id,
        'name' => $this->name,
        'description'=> $this->description,
        'price' => $this->price,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at
        ];
     }
}
