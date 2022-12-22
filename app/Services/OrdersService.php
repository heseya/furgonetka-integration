<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Api;
use App\Services\Contracts\ApiServiceContract;
use App\Services\Contracts\OrdersServiceContract;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

readonly final class OrdersService implements OrdersServiceContract
{
    public function __construct(
        private ApiServiceContract $apiService,
    ) {
    }

    public function getOrders(?string $token, ?string $dateTime, int $limit): Collection
    {
        $orders = Collection::make();

        if (null === $token) {
            return $orders;
        }

        /** @var Api $api */
        $api = Api::query()
            ->where('furgonetka_token', $token)
            ->firstOrFail();

        // orders sort by created_at (the oldest first)
        $response = $this->apiService->send($api, 'GET', '/orders', [
            'sort' => 'created_at',
            'limit' => $limit,
            'from' => null !== $dateTime ?
                Str::of($dateTime)->beforeLast(' ') :
                Carbon::today()->subDays(100)->startOfDay()->toDateString(),
        ]);

        foreach ($response->json('data') as $order) {
            $orders->push($this->getOrder($api, $order['id']));
        }

        return $orders;
    }

    public function getOrder(Api $api, string $orderId): array
    {
        $response = $this->apiService->send($api, 'GET', "/orders/id:$orderId");

        return $response->json('data');
    }
}
