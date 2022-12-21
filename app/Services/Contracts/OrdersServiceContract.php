<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use Illuminate\Support\Collection;

interface OrdersServiceContract
{
    public function getOrders(string $token, string $dateTime, int $limit): Collection;
}
