<?php

declare(strict_types=1);

namespace Modules\User\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Models\Team;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Modules\User\OwnerRole;
use Modules\Xot\Datas\XotData;

trait HasTeams
{
    /**
     * Determine if the given team is the current team.
     *
     * @return bool
     */
    public function isCurrentTeam($team)
    {
        return $team->id === $this->currentTeam->id;
    }

    /**
     * Get the current team of the user's context.
     *
     * @return BelongsTo
     */
    public function currentTeam()
    {
        $xot = XotData::make();
        if (is_null($this->current_team_id) && $this->id) {
            $this->switchTeam($this->personalTeam());
        }

        return $this->belongsTo($xot->getTeamClass(), 'current_team_id');
    }

    /**
     * Switch the user's context to the given team.
     *
     * @return bool
     */
    public function switchTeam($team)
    {
        if (! $this->belongsToTeam($team)) {
            return false;
        }

        $this->forceFill([
            'current_team_id' => $team->id,
        ])->save();

        $this->setRelation('currentTeam', $team);

        return true;
    }

    /**
     * Get all of the teams the user owns or belongs to.
     *
     * @return Collection
     */
    public function allTeams()
    {
        return $this->ownedTeams->merge($this->teams)->sortBy('name');
    }

    /**
     * Get all of the teams the user owns.
     *
     * @return HasMany
     */
    public function ownedTeams()
    {
        return $this->hasMany($xot->getTeamClass());
    }

    /**
     * Get all of the teams the user belongs to.
     *
     * @return BelongsToMany
     */
    public function teams()
    {
        $xot = XotData::make();

        return $this->belongsToMany($xot->getTeamClass(), $xot->getMembershipClass(), 'aaaa', 'bbbb', 'ccc', 'dddd')
            ->withPivot('role')
            ->withTimestamps()
            ->as('membership');
    }

    /**
     * Get the user's "personal" team.
     *
     * @return Team
     */
    public function personalTeam()
    {
        return $this->ownedTeams->where('personal_team', true)->first();
    }

    /**
     * Determine if the user owns the given team.
     *
     * @return bool
     */
    public function ownsTeam($team)
    {
        if (is_null($team)) {
            return false;
        }

        return $this->id === $team->{$this->getForeignKey()};
    }

    /**
     * Determine if the user belongs to the given team.
     *
     * @return bool
     */
    public function belongsToTeam($team)
    {
        if (is_null($team)) {
            return false;
        }

        return $this->ownsTeam($team) || $this->teams->contains(fn($t) => $t->id === $team->id);
    }

    /**
     * Get the role that the user has on the team.
     *
     * @return \Modules\User\Role|null
     */
    public function teamRole($team)
    {
        if ($this->ownsTeam($team)) {
            return new OwnerRole();
        }

        if (! $this->belongsToTeam($team)) {
            return;
        }

        $role = $team->users
            ->where('id', $this->id)
            ->first()
            ->membership
            ->role;

        return $role ? FilamentJet::findRole($role) : null;
    }

    /**
     * Determine if the user has the given role on the given team.
     *
     * @return bool
     */
    public function hasTeamRole($team, string $role)
    {
        if ($this->ownsTeam($team)) {
            return true;
        }

        return $this->belongsToTeam($team) && optional(FilamentJet::findRole($team->users->where(
            'id',
            $this->id
        )->first()->membership->role))->key === $role;
    }

    /**
     * Get the user's permissions for the given team.
     *
     * @return array
     */
    public function teamPermissions($team)
    {
        if ($this->ownsTeam($team)) {
            return ['*'];
        }

        if (! $this->belongsToTeam($team)) {
            return [];
        }

        return (array) optional($this->teamRole($team))->permissions;
    }

    /**
     * Determine if the user has the given permission on the given team.
     *
     * @return bool
     */
    public function hasTeamPermission($team, string $permission)
    {
        if ($this->ownsTeam($team)) {
            return true;
        }

        if (! $this->belongsToTeam($team)) {
            return false;
        }

        if (in_array(HasApiTokens::class, class_uses_recursive($this))
            && ! $this->tokenCan($permission)
            && null !== $this->currentAccessToken()) {
            return false;
        }

        $permissions = $this->teamPermissions($team);

        return in_array($permission, $permissions)
            || in_array('*', $permissions)
            || (Str::endsWith($permission, ':create') && in_array('*:create', $permissions))
            || (Str::endsWith($permission, ':update') && in_array('*:update', $permissions));
    }
}
