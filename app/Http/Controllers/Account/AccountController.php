<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Account;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Http\Request;
use Inertia\Inertia;
use Request;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Accounts/Index', [
            'accounts' => Account::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->with('user')
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'slug' => $user->slug,
                    'user' => [
                        'name' => $user->user->name
                    ],
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

    public function show(Account $account)
    {
        return Inertia::render('Accounts/Edit', [
            'acount' => $account
        ]);
    }

    public function create()
    {
        return Inertia::render('Accounts/Create');
    }

    public function store()
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
        ]);

        Account::create($attributes);

        return redirect('/accounts');
    }

    public function update(Request $request, Account $account)
    {
        $account->name = $request->name;
        $account->email = $request->email;
        $account->save();

        return Redirect::back()->with('success', 'Account was updated successfully.');
    }
}
