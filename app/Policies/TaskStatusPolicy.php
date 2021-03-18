<?php

namespace App\Policies;

use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User|null $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param TaskStatus $taskStatus
     * @return bool
     */
    public function view(User $user, TaskStatus $taskStatus): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param TaskStatus $taskStatus
     * @return bool
     */
    public function update(User $user, TaskStatus $taskStatus): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param TaskStatus $taskStatus
     * @return bool
     */
    public function delete(User $user, TaskStatus $taskStatus): bool
    {
        /* @phpstan-ignore-next-line */
        return $user->id == $taskStatus->creator_id;
    }
}
