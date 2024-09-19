<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Membership;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

// use Modules\User\Models\OwnerRole;

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait HasTeams
{
    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $teamContract): bool
    {
        if (null === $this->currentTeam) {
            return false;
        }

        return $teamContract->getKey() ===
            $this->currentTeam->getKey();
    }

    /**
     * Get the current team of the user's context.
     */
    public function currentTeam(): BelongsTo
    {
        $xot = XotData::make();
        if (null === $this->current_team_id && $this->id) {
            $this->switchTeam($this->personalTeam());
        }

        if (0 === $this->allTeams()->count()) {
            $this->current_team_id = null;
            $this->update();
        }
        /** @var class-string<Model> */
        $team_class = $xot->getTeamClass();

        return $this->belongsTo($team_class, 'current_team_id');
    }

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(?TeamContract $teamContract): bool
    {
        if (! $teamContract instanceof TeamContract) {
            return false;
        }

        if (! $this->belongsToTeam($teamContract)) {
            return false;
        }

        $this->forceFill(
            [
                'current_team_id' => $teamContract->getKey(),
            ]
        )->save();

        $this->setRelation('currentTeam', $teamContract);

        return true;
    }

    /**
     * Get all of the teams the user owns or belongs to.
     *
     * @return Collection<TeamContract>
     */
    public function allTeams(): Collection
    {
        return $this->ownedTeams->merge($this->teams)->sortBy('name');
    }

    /**
     * Get all of the teams the user owns.
     */
    public function ownedTeams(): HasMany
    {
        $xot = XotData::make();
        /** @var class-string<Model> */
        $team_class = $xot->getTeamClass();

        return $this->hasMany($team_class);
    }

    /**
     * Get all of the teams the user belongs to.
     */
    public function teams(): BelongsToMany
    {
        $xot = XotData::make();
        $pivotClass = $xot->getMembershipClass();
        $pivot = app($pivotClass);
        $pivotTable = $pivot->getTable();
        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        // $myDbName = $this->getConnection()->getDatabaseName();
        $pivotTableFull = $pivotTable;

        /** @var class-string<Model> */
        $team_class = $xot->getTeamClass();
        $team_classDbName = app($team_class)->getConnection()->getDatabaseName();

        if ($pivotDbName !== $team_classDbName) {
            $pivotTableFull = $pivotDbName.'.'.$pivotTable;
        }

        // if ($pivotDbName !== $myDbName) {
        //     $pivotTableFull = $pivotDbName.'.'.$pivotTable;
        // }

        // /** @var class-string<Model> */
        // $team_class = $xot->getTeamClass();

        // dddx([
        //     '$pivotDbName !== $team_classDbName' => $pivotDbName !== $team_classDbName,
        //     '$pivot' => $pivot,
        //     '$pivotDbName' => $pivotDbName,
        //     '$team_classDbName' => $team_classDbName,
        //     '$pivotTableFull' => $pivotTableFull,
        //     '$team_class' => $team_class,
        //     '$pivotClass' => $pivotClass
        // ]);

        // dddx([
        //     '$pivotDbName !== $myDbName' => $pivotDbName !== $myDbName,
        //     '$pivot' => $pivot,
        //     '$pivotDbName' => $pivotDbName,
        //     '$myDbName' => $myDbName,
        //     '$pivotTableFull' => $pivotTableFull,
        //     '$team_class' => $team_class,
        //     '$pivotClass' => $pivotClass
        // ]);

        // dddx(
        //     $this->belongsToMany($team_class, $pivotTableFull, null, 'team_id')
        //     ->using($pivotClass)
        //     ->withPivot('role')
        //     ->withTimestamps()
        //     ->as('membership')
        //     ->toSql()
        // );

        // $this->setConnection('mysql');
        return $this->belongsToMany($team_class, $pivotTableFull, null, 'team_id')
            ->using($pivotClass)
            ->withPivot('role')
            ->withTimestamps()
            ->as('membership');
    }

    /**
     * Get the user's "personal" team.
     */
    public function personalTeam(): ?TeamContract
    {
        $res = $this->ownedTeams->where('personal_team', true)->first();
        if (null === $res) {
            return null;
        }

        if (! $res instanceof TeamContract) {
            throw new \Exception('strange things');
        }

        return $res;
    }

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(?TeamContract $teamContract): bool
    {
        if (! $teamContract instanceof TeamContract) {
            return false;
        }

        return $this->id === $teamContract->{$this->getForeignKey()};
    }

    /**
     * Determine if the user belongs to the given team.
     */
    public function belongsToTeam(?TeamContract $teamContract): bool
    {
        if (! $teamContract instanceof TeamContract) {
            return false;
        }

        if ($this->ownsTeam($teamContract)) {
            return true;
        }

        return (bool) $this->teams->contains(static fn ($t): bool => $t->getKey() === $teamContract->getKey());
    }

    /**
     * Get the role that the user has on the team.
     */
    public function teamRole(TeamContract $teamContract): ?Role
    {
        // if ($this->ownsTeam($team)) {
        //    return new OwnerRole();
        // }
        $role = null;

        if (! $this->belongsToTeam($teamContract)) {
            return $role;
        }

        Assert::notNull($user = $teamContract->users()->where('id', $this->id)->first(), '['.__LINE__.']['.class_basename($this).']');
        Assert::isInstanceOf($user, XotData::make()->getUserClass(), '['.__LINE__.']['.class_basename($this).']');
        /**
         * @var UserContract $user
         */
        // Access to an undefined property Modules\User\Models\User::$membership.
        // return $teamContract->users()
        //     ->where('id', $this->id)
        //     ->first()
        //     ->membership
        //     ->role; // ? FilamentJet::findRole($role) : null;
        /**
         * @var Membership $membership
         */
        $membership = $user
            ->getRelationValue('membership'); // ? FilamentJet::findRole($role) : null;

        return Role::firstOrCreate(
            ['name' => $membership->role],
            []
        );
    }

    /**
     * Determine if the user has the given role on the given team.
     */
    public function hasTeamRole(TeamContract $teamContract, string $role): bool
    {
        if ($this->ownsTeam($teamContract)) {
            return true;
        }

        /*
        return $this->belongsToTeam($teamContract) && optional(FilamentJet::findRole($teamContract->users->where(
            'id',
            $this->id
        )->first()?->membership?->role))->key === $role;
        */
        return $this->belongsToTeam($teamContract) && null !== $this->teamRole($teamContract);
    }

    /**
     * Get the user's permissions for the given team.
     */
    public function teamPermissions(TeamContract $teamContract): array
    {
        if ($this->ownsTeam($teamContract)) {
            return ['*'];
        }

        if (! $this->belongsToTeam($teamContract)) {
            return [];
        }

        return (array) $this->teamRole($teamContract)?->permissions;
    }

    /**
     * Determine if the user has the given permission on the given team.
     */
    public function hasTeamPermission(TeamContract $teamContract, string $permission): bool
    {
        if ($this->ownsTeam($teamContract)) {
            return true;
        }

        if (! $this->belongsToTeam($teamContract)) {
            return false;
        }

        /* --WIP
        if (
            \in_array(HasApiTokens::class,  class_uses_recursive($this), false)
            && ! $this->tokenCan($permission)
            && $this->currentAccessToken() !== null
        ) {
            return false;
        }
        */

        $permissions = $this->teamPermissions($teamContract);

        return \in_array($permission, $permissions, false)
            || \in_array('*', $permissions, false)
            || (Str::endsWith($permission, ':create') && \in_array('*:create', $permissions, false))
            || (Str::endsWith($permission, ':update') && \in_array('*:update', $permissions, false));
    }
}
