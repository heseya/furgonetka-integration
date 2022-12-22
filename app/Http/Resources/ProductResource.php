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
                $this->resource['price'] - ($this->resource['price'] * $this->resource['vat_rate']),
            ),
            'vat' => $this->resource['vat_rate'],
            'weight' => null,
            'quantity' => null,
            'width' => null,
            'height' => null,
            'depth' => null,
            'sku' => null,
            'imageUrl' => $this->resource['product']['cover']['url'],
        ];
    }
}
