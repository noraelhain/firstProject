<?php

namespace App\Policies;

use App\Models\User;
Use App\Models\Hotel;

class HotelPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Hotel $hotel){
        return true;
    }

    public function create(User $user){
        return true;
    }

    public function update(User $user, Hotel $hotel){
        // if($type==='admin'){
        //     return true
        // }

        return $user->id === $hotel->user_id;
    }

    public function delete(User $user, Hotel $hotel){
        // if($type==='admin'){
        //     return true
        // }

        return $user->id === $hotel->user_id;
    }
    
}
