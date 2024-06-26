<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

class InfoController extends Controller
{
    public function index(): JsonResponse
    {
        return Response::json([
            'name' => 'Furgonetka.pl',
            'author' => 'Heseya',
            'version' => '1.0.0',
            'api_version' => '^3.0.0',
            'description' => 'Integracja z serwisem furgonetka.pl',
            'microfrontend_url' => null,
            'icon' => URL::to('logo.png'),
            'licence_required' => false,
            'required_permissions' => Config::get('permissions.required'),
            'internal_permissions' => Config::get('permissions.internal'),
        ]);
    }
}
