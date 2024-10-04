<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Modules\User\Models\Device;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Exceptions\RoleDoesNotExist;

trait IsProfileTrait
{
    use InteractsWithMedia;

    /**
     * Undocumented function.
     * return BelongsTo<UserContract>.
     */
    public function user(): BelongsTo
    {
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass);
    }

    // ---- mutators
    public function getFullNameAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        $res = $this->first_name.' '.$this->last_name;
        if (\strlen($res) > 2) {
            return $res;
        }

        return $this->user?->name;
    }

    public function getFirstNameAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }
        $value = $this->user?->first_name;
        $this->update(['first_name' => $value]);

        return $value;
    }

    public function getLastNameAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }
        $value = $this->user?->last_name;
        $this->update(['last_name' => $value]);

        return $value;
    }

    /**
     * Get the user's user_name.
     */
    protected function userName(): Attribute
    {
        return Attribute::make(
            get: function (): ?string {
                return $this->user?->name;
            }
        );
    }

    /**
     * Get the user's avatar.
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $value = $this->getFirstMediaUrl('avatar');

                return $value;
            }
        );
    }

    public function isSuperAdmin(): bool
    {
        if (null === $this->user) {
            return false;
        }

        return $this->user->hasRole('super-admin');
    }

    public function isNegateSuperAdmin(): bool
    {
        if (null === $this->user) {
            return false;
        }

        return $this->user->hasRole('negate-super-admin');
    }

    public function toggleSuperAdmin(): void
    {
        $user = $this->user;
        if (null === $user) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }
        $to_assign = 'super-admin';
        $to_remove = 'negate-super-admin';
        if ($this->isSuperAdmin()) {
            $to_assign = 'negate-super-admin';
            $to_remove = 'super-admin';
        }

        try {
            $user->assignRole($to_assign);
            $user->removeRole($to_remove);
        } catch (RoleDoesNotExist $e) {
            $role_assign = Role::updateOrCreate(['name' => $to_assign], ['team_id' => null]);
            $role_remove = Role::updateOrCreate(['name' => $to_remove], ['team_id' => null]);
            $user->roles()->attach($role_assign);
            $user->roles()->detach($role_remove);
        } catch (\Exception $e) {
            Notification::make()
                ->title('Exception !')
                ->danger()
                ->persistent()
                ->body($e->getMessage())
                ->send();
        }

        return;
    }

    public function mobileDevices(): BelongsToMany
    {
        return $this->devices();
    }

    public function devices(): BelongsToMany
    {
        $pivotClass = DeviceUser::class;
        $pivot = app($pivotClass);
        $pivotTable = $pivot->getTable();
        $pivotFields = $pivot->getFillable();

        return $this
            ->belongsToMany(
                related: Device::class,
                table: $pivotTable,
                foreignPivotKey: 'user_id',
                relatedPivotKey: null,
                parentKey: 'user_id',
                relatedKey: null,
                relation: null,
            )
            ->using($pivotClass)
            ->withPivot($pivotFields)
            ->withTimestamps();
    }

    public function mobileDeviceUsers(): HasMany
    {
        return $this->deviceUsers();
    }

    public function deviceUsers(): HasMany
    {
        return $this->hasMany(
            related: DeviceUser::class,
            foreignKey: 'user_id',
            localKey: 'user_id',
        );
    }

    /**
     * @return Collection<(int|string), mixed>
     */
    public function getMobileDeviceTokens(): Collection
    {
        return $this
            ->mobileDeviceUsers()
            ->whereNotNull('push_notifications_token')
            ->where('push_notifications_enabled', '=', true)
            ->get()
            ->pluck('push_notifications_token');
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
        $pivotTableFull = $pivotDbName.'.'.$pivotTable;

        // $this->setConnection('mysql');
        return $this->belongsToMany($xot->getTeamClass(), $pivotTableFull, 'user_id', 'team_id', 'user_id')
            ->using($pivotClass)
            ->withPivot('role')
            ->withTimestamps()
            ->as('membership');
    }
}
