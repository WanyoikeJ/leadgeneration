<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(Admin $admin)
    {
        return $admin->email === 'lee20@example.org';
    }

    public function edit(Admin $admin, Admin $model)
    {
        return (bool) mt_rand(0, 1); // 👀
    }
}
