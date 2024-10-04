<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Contracts\ProfileContract;

/**
 * @property string                                                                                           $id
 * @property string|null                                                                                      $name
 * @property string|null                                                                                      $first_name
 * @property string|null                                                                                      $last_name
 * @property string                                                                                           $email
 * @property \Illuminate\Support\Carbon|null                                                                  $email_verified_at
 * @property string                                                                                           $password
 * @property string|null                                                                                      $remember_token
 * @property int|null                                                                                         $current_team_id
 * @property string|null                                                                                      $profile_photo_path
 * @property \Illuminate\Support\Carbon|null                                                                  $created_at
 * @property \Illuminate\Support\Carbon|null                                                                  $updated_at
 * @property \Illuminate\Support\Carbon|null                                                                  $deleted_at
 * @property \Illuminate\Support\Carbon|null                                                                  $password_expires_at
 * @property string|null                                                                                      $lang
 * @property bool                                                                                             $is_active
 * @property bool                                                                                             $is_otp
 * @property string|null                                                                                      $updated_by
 * @property string|null                                                                                      $created_by
 * @property string|null                                                                                      $deleted_by
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\AuthenticationLog>            $authentications
 * @property int|null                                                                                         $authentications_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\OauthClient>                  $clients
 * @property int|null                                                                                         $clients_count
 * @property TenantUser                                                                                       $pivot
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Device>                       $devices
 * @property int|null                                                                                         $devices_count
 * @property string|null                                                                                      $full_name
 * @property AuthenticationLog|null                                                                           $latestAuthentication
 * @property \Illuminate\Notifications\DatabaseNotificationCollection<int, \Modules\User\Models\Notification> $notifications
 * @property int|null                                                                                         $notifications_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team>                         $ownedTeams
 * @property int|null                                                                                         $owned_teams_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Permission>                   $permissions
 * @property int|null                                                                                         $permissions_count
 * @property ProfileContract|null                                                                             $profile
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Role>                         $roles
 * @property int|null                                                                                         $roles_count
 * @property Membership                                                                                       $membership
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team>                         $teams
 * @property int|null                                                                                         $teams_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Tenant>                       $tenants
 * @property int|null                                                                                         $tenants_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\OauthAccessToken>             $tokens
 * @property int|null                                                                                         $tokens_count
 *
 * @method static \Modules\User\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User   permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User   query()
 * @method static \Illuminate\Database\Eloquent\Builder|User   role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User   withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User   withoutRole($roles, $guard = null)
 *
 * @property string      $surname
 * @property string|null $facebook_id
 * @property Team|null   $currentTeam
 *
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsOtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 *
 * @mixin \Eloquent
 */
class User extends BaseUser
{
    /** @var string */
    protected $connection = 'user';

    public function canAccessSocialite(): bool
    {
        // Add the necessary logic
        // For example:
        return true; // or implement your own condition
    }
}
