<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\User;
use Modules\User\Models\User as Post;

class PermissionPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Post $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Post $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return true
     */
    public function create(Post $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Post $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Post $user, Post $post): bool
    {
        // return $user->ownsTeam($team);
        return true;
    }
}
