<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Token;
use Laravel\Passport\TransientToken;

/**
 * @propery \Laravel\Passport\Token|\Laravel\Passport\TransientToken|null $accessToken;
 */
interface PassportHasApiTokensContract
{
    /**
     * Get all of the user's registered OAuth clients.
     */
    public function clients(): HasMany;

    /**
     * Get all of the access tokens for the user.
     */
    public function tokens(): HasMany;

    /**
     * Get the current access token being used by the user.
     */
    public function token(): Token|TransientToken|null;

    /**
     * Determine if the current API token has a given scope.
<<<<<<< HEAD
=======
     *
     * @param  string  $scope
     * @return bool
>>>>>>> 2a8c136 (Dusting)
     */
    public function tokenCan(string $scope): bool;

    /**
     * Create a new personal access token for the user.
<<<<<<< HEAD
=======
     *
     * @param  string  $name
     * @return PersonalAccessTokenResult
>>>>>>> 2a8c136 (Dusting)
     */
    public function createToken(string $name, array $scopes = []): PersonalAccessTokenResult;

    /**
     * Set the current access token for the user.
     *
<<<<<<< HEAD
=======
     * @param  Token|TransientToken  $accessToken
>>>>>>> 2a8c136 (Dusting)
     * @return $this
     */
    public function withAccessToken(Token|TransientToken $accessToken);
}
