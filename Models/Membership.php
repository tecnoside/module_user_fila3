<?php

declare(strict_types=1);

namespace Modules\User\Models;

use ArtMin96\FilamentJet\Models\Membership as FilamentJetMembership;

/**
 * Modules\User\Models\Membership.
 *
 * @property int                             $id
 * @property int                             $team_id
 * @property int                             $user_id
 * @property string|null                     $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUserId($value)
 *
 * @mixin IdeHelperMembership
 *
 * @property string|null $customer_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCustomerId($value)
 *
 * @mixin \Eloquent
 */
class Membership extends FilamentJetMembership
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string
     */
    protected $connection = 'user';
}
