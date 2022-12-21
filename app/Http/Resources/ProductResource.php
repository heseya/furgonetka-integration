<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'sourceProductId' => $this->resource['product']['id'],
            'name' => $this->resource['name'],
            'priceGross' => $this->resource['price'],
//            "priceNet" => 1000,
//            "vat" => 23,
//            "weight" => 2.5,
//            "quantity" => 4,
//            "width" => 30,
//            "height" => 30,
//            "depth" => 50,
//            "sku" => 234234234234,
            'imageUrl' => $this->resource['product']['cover']['url'],
        ];
    }
}
