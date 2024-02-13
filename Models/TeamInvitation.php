<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\User\Contracts\TeamContract;
use Modules\User\Database\Factories\TeamInvitationFactory;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\TeamInvitation.
 *
 * @property int               $id
 * @property string|null       $team_id
 * @property string            $email
 * @property string|null       $role
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property Team|null         $team
 * @property TeamContract|null $team
 *
 * @method static TeamInvitationFactory  factory($count = null, $state = [])
 * @method static Builder|TeamInvitation newModelQuery()
 * @method static Builder|TeamInvitation newQuery()
 * @method static Builder|TeamInvitation query()
 * @method static Builder|TeamInvitation whereCreatedAt($value)
 * @method static Builder|TeamInvitation whereEmail($value)
 * @method static Builder|TeamInvitation whereId($value)
 * @method static Builder|TeamInvitation whereRole($value)
 * @method static Builder|TeamInvitation whereTeamId($value)
 * @method static Builder|TeamInvitation whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class TeamInvitation extends BaseModel
{
    protected string $connection = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected array $fillable = [
        'email',
        'role',
    ];

    /**
     * Get the team that the invitation belongs to.
     *  BelongsTo<the related model, the current model>
     * -return BelongsTo<TeamContract, TeamInvitation> No TeamContract ..
     */
    public function team(): BelongsTo
    {
        $xotData = XotData::make();

        return $this->belongsTo($xotData->getTeamClass());
    }
}
