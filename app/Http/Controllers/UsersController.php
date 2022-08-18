<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Http\Request;
use Inertia\Inertia;
use Request;

class UsersController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'can' => [
                        'edit' => true
                        // 'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => true
                // 'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

    public function show($id)
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => User::findOrFail(intval($id)),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->filled('password')){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return Redirect::back()->with('success', 'Team Member was updated successfully.');
    }

    public function create()
    {
        return Inertia::render('Admin/Users/Create');
    }

    public function store()
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        User::create($attributes);

        return redirect('/users');
    }
}
