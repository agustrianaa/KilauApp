<?php

namespace App\Policies;

use App\Models\User;
use App\Models\calonAnakBinaan;
use Illuminate\Auth\Access\Response;

class CalonAnakBinaanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, calonAnakBinaan $calonAnakBinaan): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, calonAnakBinaan $calonAnakBinaan): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, calonAnakBinaan $calonAnakBinaan): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, calonAnakBinaan $calonAnakBinaan): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, calonAnakBinaan $calonAnakBinaan): bool
    {
        //
    }
}
