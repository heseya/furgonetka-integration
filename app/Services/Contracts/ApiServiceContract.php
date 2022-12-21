<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Exceptions\ApiAuthenticationException;
use App\Exceptions\ApiAuthorizationException;
use App\Exceptions\ApiClientErrorException;
use App\Exceptions\ApiConnectionException;
use App\Exceptions\ApiServerErrorException;
use App\Models\Api;
use Illuminate\Http\Client\Response;

interface ApiServiceContract
{
    public function get(
        Api $api,
        string $url,
        array $headers = [],
        bool $tryRefreshing = true,
    ): Response;

    public function post(
        Api $api,
        string $url,
        array $data,
        array $headers = [],
        bool $tryRefreshing = true,
    ): Response;

    public function patch(
        Api $api,
        string $url,
        array $data,
        array $headers = [],
        bool $tryRefreshing = true,
    ): Response;

    public function delete(
        Api $api,
        string $url,
        array $data,
        array $headers = [],
        bool $tryRefreshing = true,
    ): Response;

    public function send(
        Api $api,
        string $method,
        string $url,
        ?array $data = [],
        array $headers = [],
        bool $tryRefreshing = true,
        bool $withToken = true,
    ): Response;
}
