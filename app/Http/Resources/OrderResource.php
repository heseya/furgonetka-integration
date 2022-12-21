<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "sourceOrderId" => $this->resource['code'],
            "datetimeOrder" => $this->resource['created_at'],
//            "sourceDatetimeChange" => "2021-05-26T08:47:06",
//            "service" => "dpd",
//            "serviceDescription" => "Kurier DPD",
            "status" => $this->resource->status['name'],
            "totalPrice" => $this->resource['summary'],
            "shippingCost" => $this->resource['shipping_price'],
            "totalPaid" => $this->resource['summary_paid'],
//            "codAmount" => 4920.99,
//            "totalWeight" => 0,
//            "point" => "PL11033",
            "comment" => $this->resource['comment'],
            "shippingAddress" => AddressResource::make(
                $this->resource['delivery_address'],
                $this->resource['email'],
            ),
//            "products" => ProductResource::collection($this->resource->products),
        ];
    }
}
