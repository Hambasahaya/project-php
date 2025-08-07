<?php

namespace App\Policies;

use App\Models\User;
use App\Models\pengalaman_kerjas;
use Illuminate\Auth\Access\Response;

class PengalamanKerjasPolicy
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
    public function view(User $user, pengalaman_kerjas $pengalamanKerjas): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, pengalaman_kerjas $pengalamanKerjas): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, pengalaman_kerjas $pengalamanKerjas): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, pengalaman_kerjas $pengalamanKerjas): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, pengalaman_kerjas $pengalamanKerjas): bool
    {
        return false;
    }
}
