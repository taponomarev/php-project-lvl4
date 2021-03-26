<?php

namespace App\Policies;

use App\Models\Label;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param user|null $user
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
     * @param Label $label
     * @return bool
     */
    public function view(User $user, Label $label): bool
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
     * @param Label $label
     * @return bool
     */
    public function update(User $user, Label $label): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Label $label
     * @return bool
     */
    public function delete(User $user, Label $label): bool
    {
        return true;
    }
}
