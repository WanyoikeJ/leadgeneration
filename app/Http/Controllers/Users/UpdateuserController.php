<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UpdateuserController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        // return Redirect::route('Users/Index');

        return Redirect::back()->with('success', 'Team Member was updated successfully.');
    }
}
