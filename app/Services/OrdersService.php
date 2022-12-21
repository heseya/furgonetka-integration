<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Api;
use App\Services\Contracts\ApiServiceContract;
use App\Services\Contracts\OrdersServiceContract;

readonly final class OrdersService implements OrdersServiceContract
{
    public function __construct(
        private ApiServiceContract $apiService,
    ) {
    }

    public function getOrders(?string $token, ?string $dateTime, int $limit): array
    {
        if (null === $token) {
            return [];
        }

        /** @var Api $api */
        $api = Api::query()
            ->where('furgonetka_token', $token)
            ->firstOrFail();

        $data = [];
        if ($dateTime !== null) {
            $data['from'] = $dateTime;
        }

        // orders sort by created_at (the oldest first)
        $response = $this->apiService->send($api, 'GET', '/orders', [
            ...$data,
            'sort' => 'created_at:desc',
            'limit' => $limit,
        ]);

        return $response->json('data');
    }
}
