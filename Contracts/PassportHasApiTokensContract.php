<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * @propery \Laravel\Passport\Token|\Laravel\Passport\TransientToken|null $accessToken;
 */
interface PassportHasApiTokensContract
{
    /**
     * Get all of the user's registered OAuth clients.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients();

    /**
     * Get all of the access tokens for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens();

    /**
     * Get the current access token being used by the user.
     *
     * @return \Laravel\Passport\Token|\Laravel\Passport\TransientToken|null
     */
    public function token();

    /**
     * Determine if the current API token has a given scope.
     *
     * @param  string  $scope
     * @return bool
     */
    public function tokenCan($scope);

    /**
     * Create a new personal access token for the user.
     *
     * @param  string  $name
     * @return \Laravel\Passport\PersonalAccessTokenResult
     */
    public function createToken($name, array $scopes = []);

    /**
     * Set the current access token for the user.
     *
     * @param  \Laravel\Passport\Token|\Laravel\Passport\TransientToken  $accessToken
     * @return $this
     */
    public function withAccessToken($accessToken);
}
