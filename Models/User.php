<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Modules\Egea\Models\MobileDevice;
use Modules\Egea\Models\MobileDeviceUser;
use Modules\EWall\Models\Profile;
use Modules\Notify\Models\Notification;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Traits\HasTeams;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Traits\HasRoles;

/**
 * Modules\User\Models\User.
 *
 * @property Collection<int, \Modules\User\Models\OauthClient>      $clients
 * @property int|null                                               $clients_count
 * @property \Modules\User\Models\Team|null                         $currentTeam
 * @property Collection<int, \Modules\User\Models\Device>           $devices
 * @property int|null                                               $devices_count
 * @property string|null                                            $full_name
 * @property DatabaseNotificationCollection<int, Notification>      $notifications
 * @property int|null                                               $notifications_count
 * @property Collection<int, \Modules\User\Models\Team>             $ownedTeams
 * @property int|null                                               $owned_teams_count
 * @property Collection<int, \Modules\User\Models\Permission>       $permissions
 * @property int|null                                               $permissions_count
 * @property \Modules\Camping\Models\Profile|null                   $profile
 * @property Collection<int, \Modules\User\Models\Role>             $roles
 * @property int|null                                               $roles_count
 * @property Collection<int, \Modules\User\Models\Team>             $teams
 * @property int|null                                               $teams_count
 * @property Collection<int, \Modules\User\Models\OauthAccessToken> $tokens
 * @property int|null                                               $tokens_count
 *
 * @method static \Modules\User\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder|User                                 newModelQuery()
 * @method static Builder|User                                 newQuery()
 * @method static Builder|User                                 permission($permissions)
 * @method static Builder|User                                 query()
 * @method static Builder|User                                 role($roles, $guard = null)
 *
 * @property string                          $id
 * @property string                          $name
 * @property string                          $first_name
 * @property string                          $last_name
 * @property string                          $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string                          $password
 * @property string|null                     $remember_token
 * @property int|null                        $current_team_id
 * @property string|null                     $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $deleted_at
 * @property string|null                     $lang
 * @property bool                            $is_active
 *
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCurrentTeamId($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsActive($value)
 * @method static Builder|User whereLang($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class User extends Authenticatable implements HasName, UserContract
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

    // use Traits\HasTenants;

    /**
     * @var string
     */
    protected $connection = 'user';

    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fist_name',
        'last_name',
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

    public function getFilamentName(): string
    {
        return sprintf(
            '%s %s %s',
            $this->name,
            $this->first_name,
            $this->last_name,
        );
    }

    public function profile(): HasOne
    {
        $profileClass = XotData::make()->getProfileClass();

        return $this->hasOne($profileClass);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // $panel->default('admin');
        if ('admin' !== $panel->getId()) {
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

    /*
    public function mobileDevices(): BelongsToMany
    {
        return $this
            ->belongsToMany(MobileDevice::class)
            ->using(MobileDeviceUser::class)
            ->withPivot(MobileDeviceUser::$additionalPivotFields)
            ->withTimestamps();
    }
    */
    public function devices(): BelongsToMany
    {
        $pivot_class = DeviceUser::class;
        $pivot = app($pivot_class);
        $pivot_fields = $pivot->getFillable();

        return $this
            ->belongsToMany(Device::class)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
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

    public function getFullNameAttribute(?string $value): ?string
    {
        if (null != $value) {
            return $value;
        }

        return $this->first_name.' '.$this->last_name;
    }
}
