<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Carbon;
use Laravel\Passport\AuthCode;
use Laravel\Passport\Client as PassportClient;
use Laravel\Passport\Database\Factories\ClientFactory;
use Laravel\Passport\Token;

/**
 * Modules\User\Models\OauthClient.
 *
 */
class OauthClient extends PassportClient
{
    use HasUuids;
    /**
     * @var string
     */
    protected $connection = 'user';

    // class OauthClient extends BaseModel {
    /*
     * ---.
     */
    /*
    protected $fillable = [
        'id', 'user_id', 'name', 'secret', 'provider', 'redirect',
        'personal_access_client', 'password_client', 'revoked',
    ];
    */
}
