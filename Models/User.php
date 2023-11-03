<?php

declare(strict_types=1);

namespace Modules\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Laravel\Sanctum\HasApiTokens;
use Eloquent;


use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Passport\Client;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;
use Modules\Egea\Models\MobileDevice;
use Modules\Egea\Models\MobileDeviceUser;
use Modules\EWall\Models\Profile;
use Modules\Notify\Models\Notification;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Traits\HasTeams;
use Modules\Xot\Contracts\UserContract ;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements UserContract
{
    /* , HasAvatar, UserJetContract, ExportsPersonalData */
    /* , HasTeamsContract */
    use HasApiTokens;
    use HasFactory;

    // use TwoFactorAuthenticatable; //ArtMin96
    // use CanExportPersonalData; //ArtMin96
    use HasRoles;

    // use HasProfilePhoto; //ArtMin96
    // use HasTeams; //ArtMin96
    use HasTeams;
    use HasUuids;

    // use Traits\HasProfilePhoto;
    use Notifiable;
    //use Traits\HasTenants;

    public $incrementing = false;

    /**
     * @var string
     */
    protected $connection = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'lang',
        'current_team_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed', //Call to undefined cast [hashed] on column [password] in model [Modules\User\Models\User].
        'is_active' => 'boolean',
        'id' => 'string',
        'roles.pivot.id' => 'string',
        // https://github.com/beitsafe/laravel-uuid-auditing
        // ALTER TABLE model_has_role CHANGE COLUMN `id` `id` CHAR(37) NOT NULL DEFAULT uuid();
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        // 'profile_photo_url',
    ];

    public function canAccessFilament(Panel $panel = null): bool
    {
        // return $this->role_id === Role::ROLE_ADMINISTRATOR;
        return true;
    }

    public function profile(): HasOne
    {
        $profileClass = XotData::make()->getProfileClass();

        return $this->hasOne($profileClass);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() !== 'admin') {
            $role = $panel->getId();
            /*
            $xot = XotData::make();
            if ($xot->super_admin === $this->email) {
                $role = Role::firstOrCreate(['name' => $role]);
                $this->assignRole($role);
            }
            */

            return $this->hasRole($role);
        }

        return true; // str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }

    public function mobileDevices(): BelongsToMany
    {
        return $this
            ->belongsToMany(MobileDevice::class)
            ->using(MobileDeviceUser::class)
            ->withPivot(MobileDeviceUser::$additionalPivotFields)
            ->withTimestamps();
    }

    // ----------------------
    // ----------------------
    // ---------------------
    /**
     * Get the entity's notifications.
     *
     * @return MorphMany
     */
    public function notifications()
    {
        // return $this->morphMany(DatabaseNotification::class, 'notifiable')->latest();
        return $this->morphMany(Notification::class, 'notifiable')->latest();
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
