<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Api;
use App\Services\Contracts\ConfigServiceContract;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class ConfigService implements ConfigServiceContract
{
    public function getConfigs(Api $api): array
    {
        return [
            $this->configField(
                'Adres URL',
                Config::get('app.url'),
            ),
            $this->configField(
                'Token',
                $api->furgonetka_token,
            ),
        ];
    }

    private function configField(string $label, mixed $value): array
    {
        return [
            'key' => Str::snake($label),
            'label' => $label,
            'placeholder' => $value,
            'type' => 'text',
            'default_value' => $value,
            'required' => false,
            'value' => $value,
        ];
    }
}
