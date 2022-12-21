<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Services\Contracts\OrdersServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Response;

class OrdersController extends Controller
{
    public function __construct(
        private readonly OrdersServiceContract $ordersService,
    ) {
    }

    public function show(Request $request): JsonResource
    {
        return OrderResource::collection($this->ordersService->getOrders(
            $request->header('Authorization'),
            $request->input('datetime'),
            (int) $request->input('limit', 30),
        ));
    }
}
