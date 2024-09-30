<?php

namespace App\Policies;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MealPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Meal $meal): Response
    {
        return $user->id === $meal->user_id

        ? Response::allow()
        : Response::deny("You're trying to access someone else's meal");
    }   

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is($user);
    }

    public function edit(User $user, Meal $meal): bool
    {
        return $meal->user->is($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Meal $meal): bool
    {
        return $meal->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Meal $meal): bool
    {
        return $meal->user->is($user);
    }

}
