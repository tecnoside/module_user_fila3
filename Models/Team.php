<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * Class Modules\User\Models\Team.
 *
 * @property string                                                                             $id
 * @property string                                                                             $user_id                (DC2Type:guid)
 * @property string                                                                             $name
 * @property int                                                                                $personal_team
 * @property \Illuminate\Support\Carbon|null                                                    $created_at
 * @property \Illuminate\Support\Carbon|null                                                    $updated_at
 * @property string|null                                                                        $updated_by
 * @property string|null                                                                        $created_by
 * @property \Illuminate\Support\Carbon|null                                                    $deleted_at
 * @property string|null                                                                        $deleted_by
 * @property \Modules\Xot\Contracts\ProfileContract|null                                        $creator
 * @property TeamUser                                                                           $pivot
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User>           $members
 * @property int|null                                                                           $members_count
 * @property User|null                                                                          $owner
 * @property string                                                                             $id
 * @property string                                                                             $user_id                (DC2Type:guid)
 * @property string                                                                             $name
 * @property int                                                                                $personal_team
 * @property \Illuminate\Support\Carbon|null                                                    $created_at
 * @property \Illuminate\Support\Carbon|null                                                    $updated_at
 * @property string|null                                                                        $updated_by
 * @property string|null                                                                        $created_by
 * @property \Illuminate\Support\Carbon|null                                                    $deleted_at
 * @property string|null                                                                        $deleted_by
 * @property \Modules\Xot\Contracts\ProfileContract|null                                        $creator
 * @property TeamUser                                                                           $pivot
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User>           $members
 * @property int|null                                                                           $members_count
 * @property User|null                                                                          $owner
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\TeamInvitation> $teamInvitations
 * @property int|null                                                                           $team_invitations_count
 * @property \Modules\Xot\Contracts\ProfileContract|null                                        $updater
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User>           $users
 * @property int|null                                                                           $users_count
 *
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Team   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team   whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Team extends BaseTeam
{
}
