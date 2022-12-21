<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Api;
use App\Services\Contracts\ApiServiceContract;
use App\Services\Contracts\OrdersServiceContract;
use Illuminate\Support\Collection;

readonly class OrdersService implements OrdersServiceContract
{
    public function __construct(
        private ApiServiceContract $apiService,
    ) {
    }

    public function getOrders(?string $token, ?string $dateTime, int $limit): Collection
    {
        if ($token === null) {
            return Collection::make();
        }

        /** @var Api $api */
        $api = Api::query()
            ->where('furgonetka_token', $token)
            ->firstOrFail();

        $url = $dateTime ? "orders?limit=$limit&from=$dateTime" : "orders?limit=$limit";
        $response = $this->apiService->get($api, $url);

        return $response->json('data');
    }
}
