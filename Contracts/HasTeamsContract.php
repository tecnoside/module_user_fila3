<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\User\Contracts\HasTeamsContract.
 *
 * @property int                                                         $id
 * @property string                                                      $name
 * @property string                                                      $two_factor_secret
 * @property TeamContract|null                                           $currentTeam
 * @property Collection                                                  $tokens
 * @property \Illuminate\Support\Carbon|null                             $two_factor_confirmed_at
 * @property int                                                         $current_team_id
 * @property \Illuminate\Database\Eloquent\Collection<int, TeamContract> $ownedTeams
 *
 * @mixin \Eloquent
 */
interface HasTeamsContract
{
    // extends
    // HasApiTokens, //no sanctum ma passport
    // PassportHasApiTokensContract,
    // HasProfilePhotoContract,
    // TwoFactorAuthenticatableContract,
    // MustVerifyEmail,
    // CanResetPassword,
    // ModelContract
    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $team): bool;

    /**
     * Get the current team of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentTeam();

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(TeamContract $team): bool;

    /**
     * Get all of the teams the user owns or belongs to.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allTeams();

    /**
     * Get all of the teams the user owns.
     */
    public function ownedTeams(): HasMany;

    /**
     * Get all of the teams the user belongs to.
     */
    public function teams(): BelongsToMany;

    /**
     * Get the user's "personal" team.
     */
    public function personalTeam(): ?TeamContract;

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(TeamContract $team): bool;

    /**
     * Determine if the user belongs to the given team.
     */
    public function belongsToTeam(TeamContract $team): bool;

    /**
     * Get the role that the user has on the team.
     *
     * @return \Modules\User\Role|null
     */
    public function teamRole(TeamContract $team);

    /**
     * Determine if the user has the given role on the given team.
     */
    public function hasTeamRole(TeamContract $team, string $role): bool;

    /**
     * Get the user's permissions for the given team.
     */
    public function teamPermissions(TeamContract $team): array;

    /**
     * Determine if the user has the given permission on the given team.
     */
    public function hasTeamPermission(TeamContract $team, string $permission): bool;
}
