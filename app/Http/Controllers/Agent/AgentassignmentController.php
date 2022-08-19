<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent\Agentassignment;
use Inertia\Inertia;
use Request;

class AgentassignmentController extends Controller
{
    public function index()
    {
        return Inertia::render('Agenttasks', [
            'agents' => Agentassignment::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('description', 'like', "%{$search}%");
                })
                ->with(['agent','lead','admin'])
                ->paginate(10)
                ->withQueryString()
                ->through(fn($agent) => [
                    'id' => $agent->id,
                    // 'name' => $agent->name,
                    'agent' => [
                        'name' => $agent->agent->name
                    ],
                    'lead' => $agent->lead,
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
}
