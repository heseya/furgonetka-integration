<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\ApiAuthenticationException;
use App\Services\Contracts\ConfigServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ConfigController extends Controller
{
    public function __construct(
        private readonly ConfigServiceContract $configService,
    ) {
    }

    public function show(Request $request): JsonResponse
    {
        $payload = Auth::getTokenPayload();
        $api_url = $payload ? $payload['iss'] : $request->header('X-Core-Url');

        if (!$api_url) {
            throw new ApiAuthenticationException('Api not authorized');
        }

        return Response::json($this->configService->getConfigs($api_url));
    }
}
