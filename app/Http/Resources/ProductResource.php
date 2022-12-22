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
            'name' => '' !== $this->resource['name'] ? $this->resource['name'] : $this->resource['product']['name'],
            'priceGross' => $this->resource['price'],
            'priceNet' => round(
                $this->resource['price'] - ($this->resource['price'] * $this->resource['vat_rate'] / 100),
                2,
            ),
            'vat' => $this->resource['vat_rate'],
            'weight' => 0.2,
            'quantity' => $this->resource['quantity'],
            'width' => 5,
            'height' => 6,
            'depth' => 2,
            'sku' => 0,
            'imageUrl' => $this->resource['product']['cover']['url'],
        ];
    }
}
