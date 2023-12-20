<?php

declare(strict_types=1);

namespace Modules\User\Models;

use ArtMin96\FilamentJet\Models\Team as FilamentJetTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\User\Models\Team.
 *
 * @property int                                                                      $id
 * @property int                                                                      $user_id
 * @property string                                                                   $name
 * @property bool                                                                     $personal_team
 * @property \Illuminate\Support\Carbon|null                                          $created_at
 * @property \Illuminate\Support\Carbon|null                                          $updated_at
 * @property \Modules\User\Models\User|null                                           $owner
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users
 * @property int|null                                                                 $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUserId($value)
 *
 * @mixin IdeHelperTeam
 *
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\TeamInvitation> $teamInvitations
 * @property int|null                                                                           $team_invitations_count
 *
 * @mixin \Eloquent
 */
class Team extends FilamentJetTeam
{
    use HasFactory;

    /**
     * @var string
     */
    protected $connection = 'user';
}
