<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\OrdersExportRequest;
use App\Services\Contracts\OrdersServiceContract;
use Illuminate\Support\Facades\Response;

class OrdersController extends Controller
{
    public function __construct(
        private OrdersServiceContract $ordersService,
    ) {
    }

    public function show(OrdersExportRequest $request)
    {
        return Response::json($this->ordersService->getOrders(
            $request->header('Authorization'),
            $request->input('datetime'),
            $request->input('limit', 30),
        ));
    }
}
