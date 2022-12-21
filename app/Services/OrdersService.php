<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\ApiServiceContract;
use App\Services\Contracts\OrdersServiceContract;

class OrdersService implements OrdersServiceContract
{
    public function __construct(
        private ApiServiceContract $apiService,
    ) {
    }

    public function getOrders()
    {
        return []; // $this->apiService->getAll($api, 'orders', $params);
    }
}
