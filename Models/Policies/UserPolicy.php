<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\User;
use Modules\User\Models\User as Post;
use Modules\Xot\Models\Policies\XotBasePolicy;

class UserPolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return true
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->ownsTeam($team);
    }
}
