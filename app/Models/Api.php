<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasUuid;

/**
 * @mixin IdeHelperApi
 */
class Api extends Model
{
    use HasUuid;

    protected $fillable = [
        'url',
        'version',
        'integration_token',
        'refresh_token',
        'uninstall_token',
        'auth_token',
        'furgonetka_token',
    ];
}
