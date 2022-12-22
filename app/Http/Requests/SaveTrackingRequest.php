<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveTrackingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tracking.number' => ['required', 'string'],
        ];
    }
}
