<?php

declare(strict_types=1);

namespace Modules\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Notify\Models\Notification;
use Eloquent;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
use Modules\User\Contracts\UserContract as UserJetContract;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Traits\CanExportPersonalData;
use Modules\User\Models\Traits\HasProfilePhoto;
use Modules\User\Models\Traits\HasTeams;
use Modules\User\Models\Traits\TwoFactorAuthenticatable;
use Modules\Xot\Datas\XotData;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;

use Spatie\Permission\Traits\HasRoles;
use Spatie\PersonalDataExport\ExportsPersonalData;

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
 * @property Collection<int, Client> $clients
 * @property int|null                                                  $clients_count
 * @property string                                                    $profile_photo_url
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null                                                  $notifications_count
 * @property Collection<int, Permission> $permissions
 * @property int|null                                                  $permissions_count
 * @property Collection<int, Role> $roles
 * @property int|null                                                  $roles_count
 * @property Collection<int, Token> $tokens
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
 * @property Team|null                                           $currentTeam
 * @property Collection<int, Team> $ownedTeams
 * @property \Modules\EWall\Models\Profile|null                  $profile
 * @property Collection<int, Team> $teams
 *
 * @mixin Eloquent
 */
class User extends Authenticatable implements \Modules\Xot\Contracts\UserContract, FilamentUser, HasTenants, UserJetContract
{ /* , HasAvatar, UserJetContract, ExportsPersonalData */
    /* , HasTeamsContract */
    use HasApiTokens;
    use HasFactory;
    // use TwoFactorAuthenticatable; //ArtMin96
    // use CanExportPersonalData; //ArtMin96
    use HasRoles;
    // use HasProfilePhoto; //ArtMin96
    // use HasTeams; //ArtMin96
    use HasTeams;
    // use Traits\HasProfilePhoto;
    use Notifiable;
    use Traits\HasTenants;

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
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        // 'profile_photo_url',
    ];

    public function canAccessFilament(Panel $panel): bool
    {
        // return $this->role_id === Role::ROLE_ADMINISTRATOR;
        return true;
    }

    public function profile(): HasOne
    {
        $profileClass = XotData::make()->getProfileClass();

        return $this->hasOne($profileClass);
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }

    public function canAccessPanel(Panel $panel): bool
    {
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
}
