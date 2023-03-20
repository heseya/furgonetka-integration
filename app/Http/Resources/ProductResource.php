<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

final class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'sourceProductId' => Arr::get($this->resource, 'product.id'),
            'name' => '' !== $this->resource['name'] ? $this->resource['name'] : $this->resource['product']['name'],
            'priceGross' => $this->resource['price'],
            'priceNet' => round(
                $this->resource['price'] - ($this->resource['price'] * $this->resource['vat_rate'] / 100),
                2,
            ),
            'vat' => $this->resource['vat_rate'],
            'weight' => null,
            'quantity' => $this->resource['quantity'],
            'width' => null,
            'height' => null,
            'depth' => null,
            'sku' => null,
            'imageUrl' => Arr::get($this->resource, 'product.cover.url'),
        ];
    }
}
