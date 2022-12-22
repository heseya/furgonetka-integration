<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Http\Request;

class OrdersExportRequest extends Request
{
    public function rules(): array
    {
        return [
            'datetime' => ['nullable'],
            'limit' => ['nullable', 'number', 'min:1', 'max:500'],
        ];
    }
}
