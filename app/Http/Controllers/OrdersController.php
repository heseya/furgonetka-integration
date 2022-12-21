<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\OrdersExportRequest;
use App\Services\Contracts\OrdersServiceContract;

class OrdersController extends Controller
{
    public function __construct(
        private OrdersServiceContract $ordersService,
    ) {
    }

    public function show(OrdersExportRequest $request)
    {
        return $this->ordersService->getOrders();
    }
}
