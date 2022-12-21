<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'sourceOrderId' => $this->resource['code'],
            'datetimeOrder' => $this->resource['created_at'],
//            "sourceDatetimeChange" => "2021-05-26T08:47:06",
//            "service" => "dpd",
//            "serviceDescription" => "Kurier DPD",
            'status' => $this->resource['status']['name'],
            'totalPrice' => round($this->resource['summary'], 2),
            'shippingCost' => round($this->resource['shipping_price'], 2),
            'totalPaid' => round($this->resource['summary_paid'], 2),
//            "codAmount" => 4920.99,
//            "totalWeight" => 0,
//            "point" => "PL11033",
            'comment' => $this->resource['comment'],
            'shippingAddress' => [
                'name' => $this->resource['delivery_address']['name'],
                'street' => $this->resource['delivery_address']['address'],
                'city' => $this->resource['delivery_address']['city'],
                'postcode' => $this->resource['delivery_address']['zip'],
                'countryCode' => $this->resource['delivery_address']['country'],
                'phone' => $this->resource['delivery_address']['phone'],
                'email' => $this->resource['email'],
            ],
//            "products" => ProductResource::collection($this->resource->products),
        ];
    }
}
