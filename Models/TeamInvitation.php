<?php

declare(strict_types=1);

namespace Modules\User\Models;

use ArtMin96\FilamentJet\Models\TeamInvitation as FilamentJetTeamInvitation;

/**
 * Modules\User\Models\TeamInvitation.
 *
 * @property int                             $id
 * @property int                             $team_id
 * @property string                          $email
 * @property string|null                     $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereUpdatedAt($value)
 *
 * @mixin IdeHelperTeamInvitation
 *
 * @property \Modules\User\Models\Team $team
 *
 * @mixin \Eloquent
 */
class TeamInvitation extends FilamentJetTeamInvitation
{
    /**
     * @var string
     */
    protected $connection = 'user';
}
