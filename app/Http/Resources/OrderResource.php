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
            'sourceDatetimeChange' => $this->resource['created_at'],
//            "service" => "dpd",
//            "serviceDescription" => "Kurier DPD",
            'status' => $this->resource['status']['name'],
            'totalPrice' => $this->resource['summary'],
            'shippingCost' => $this->resource['shipping_price'],
            'totalPaid' => $this->resource['summary_paid'],
            'codAmount' => 0,
//            "totalWeight" => 0,
//            "point" => "PL11033",
            'comment' => $this->resource['comment'],
            'shippingAddress' => [
                'company' => '',
                'name' => $this->resource['delivery_address']['name'],
                'street' => $this->resource['delivery_address']['address'],
                'city' => $this->resource['delivery_address']['city'],
                'postcode' => $this->resource['delivery_address']['zip'],
                'countryCode' => $this->resource['delivery_address']['country'],
                'phone' => $this->resource['delivery_address']['phone'],
                'email' => $this->resource['email'],
            ],
            'products' => ProductResource::collection($this->resource['products']),
        ];
    }
}
