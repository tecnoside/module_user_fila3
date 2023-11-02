<?php

declare(strict_types=1);

namespace Modules\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Laravel\Sanctum\HasApiTokens;
use Eloquent;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
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
use Modules\Xot\Contracts\UserContract as UserJetContract;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Traits\HasRoles;

/**
 * Modules\User\Models\User.
 *
 * @property int                                                       $id
 * @property string                                                    $name
 * @property string                                                    $surname
 * @property string                                                    $email
 * @property string                                                    $api_token
 * @property Carbon|null                                               $email_verified_at
 * @property string                                                    $password
 * @property string|null                                               $two_factor_secret
 * @property string|null                                               $two_factor_recovery_codes
 * @property string|null                                               $two_factor_confirmed_at
 * @property string|null                                               $remember_token
 * @property int|null                                                  $current_team_id
 * @property string|null                                               $profile_photo_path
 * @property bool                                                      $is_active
 * @property Carbon|null                                               $created_at
 * @property Carbon|null                                               $updated_at
 * @property Collection<int, Client>                                   $clients
 * @property int|null                                                  $clients_count
 * @property string                                                    $profile_photo_url
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null                                                  $notifications_count
 * @property Collection<int, Permission>                               $permissions
 * @property int|null                                                  $permissions_count
 * @property Collection<int, Role>                                     $roles
 * @property int|null                                                  $roles_count
 * @property Collection<int, Token>                                    $tokens
 * @property int|null                                                  $tokens_count
 *
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCurrentTeamId($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereTwoFactorConfirmedAt($value)
 * @method static Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static Builder|User whereTwoFactorSecret($value)
 * @method static Builder|User whereUpdatedAt($value)
 *
 * @mixin IdeHelperUser
 *
 * @property string|null $lang
 * @property int|null    $owned_teams_count
 * @property int|null    $teams_count
 *
 * @method static Builder|User whereLang($value)
 *
 * @property Team|null                     $currentTeam
 * @property Collection<int, Team>         $ownedTeams
 * @property Profile|null                  $profile
 * @property Collection<int, Team>         $teams
 * @property string|null                   $full_name
 * @property string|null                   $deleted_at
 * @property Collection<int, MobileDevice> $mobileDevices
 * @property int|null                      $mobile_devices_count
 *
 * @method static \Modules\User\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder|User                                 whereDeletedAt($value)
 * @method static Builder|User                                 whereFullName($value)
 * @method static Builder|User                                 whereIsActive($value)
 * @method static Builder|User                                 whereSurname($value)
 *
 * @mixin Eloquent
 */
class User extends Authenticatable implements \Modules\Xot\Contracts\UserContract, FilamentUser, HasTenants, UserJetContract
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
    use Traits\HasTenants;

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
