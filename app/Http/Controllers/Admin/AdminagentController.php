<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent\Agent;
use Illuminate\Support\Facades\Auth;
use Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AdminagentController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Agents/Index', [
            'agents' => Agent::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->with('admin')
                ->paginate(10)
                ->withQueryString()
                ->through(fn($agent) => [
                    'id' => $agent->id,
                    'name' => $agent->name,
                    'admin' => [
                        'name' => $agent->admin->name
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

    public function show($id)
    {
        return Inertia::render('Admin/Agents/Edit', [
            'agent' => Agent::findOrFail(intval($id)),
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
        return Inertia::render('Admin/Agents/Create');
    }

    public function store()
    {
        $attributes = Request::validate([
            'name' => 'required|min:3',
        ]);

        Agent::create($attributes);

        return redirect('/agents');
    }
}
