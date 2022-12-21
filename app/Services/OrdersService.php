<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Api;
use App\Services\Contracts\ApiServiceContract;
use App\Services\Contracts\OrdersServiceContract;
use Illuminate\Support\Collection;

class OrdersService implements OrdersServiceContract
{
    public function __construct(
        private ApiServiceContract $apiService,
    ) {
    }

    public function getOrders(string $token, string $dateTime, int $limit): Collection
    {
        /** @var Api $api */
        $api = Api::query()
            ->where('furgonetka_token', $token)
            ->firstOrFail();

        $response = $this->apiService->get($api, "orders?from=$dateTime&limit=$limit");

        return $response->json('data');
    }
}
