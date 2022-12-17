<?php

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
        'name',
        'version',
        'licence_key',
        'integration_token',
        'refresh_token',
        'uninstall_token',
        'auth_token',
    ];
}
