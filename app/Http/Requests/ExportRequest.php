<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\Formats;
use Illuminate\Foundation\Http\FormRequest;

abstract class ExportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'api' => ['required', 'string'],
            'format' => ['nullable', 'string', new Formats()],
        ];
    }
}
