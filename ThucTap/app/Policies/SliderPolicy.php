<?php

namespace App\Policies;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Slider  $=Slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Slider $slider)
    {
        return $user->checkPermissionAccess('slider_list');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('slider_create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Slider  $=Slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user,Slider $slider)
    {
        return $user->checkPermissionAccess('slider_edit');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Slider  $=Slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Slider $slider)
    {
        return $user->checkPermissionAccess('slider_delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Slider  $=Slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Slider  $=Slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Slider $slider)
    {
        //
    }
}
