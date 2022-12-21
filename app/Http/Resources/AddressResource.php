<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class AddressResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->resource->name,
            'street' => $this->resource->address,
            'city' => $this->resource->city,
            'postcode' => $this->resource->zip,
            'countryCode' => $this->resource->country,
            'phone' => $this->resource->phone,
            'email' => $this->resource->email,
        ];
    }
}
