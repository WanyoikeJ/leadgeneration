<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\AgentatasksRequest;
use App\Http\Resources\Agent\AgentResource;
use App\Http\Resources\Lead\LeadsResource;
use App\Models\Agent\Agent;
use App\Models\Agent\Agentassignment;
use App\Models\Lead\Lead;
use App\Models\User;
use Request;
use Inertia\Inertia;

class AgentatasksController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Agenttasks/Index', [
            'tasks' => Agentassignment::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('description', 'like', "%{$search}%");
                })
                ->with(['agent','lead.account','admin'])
                ->paginate(10)
                ->withQueryString()
                ->through(fn($agent) => [
                    'id' => $agent->id,
                    'status' => (boolean) $agent->status,
                    'agent' => [
                        'name' => $agent->agent->name
                    ],
                    'lead' => [
                        'source' =>  $agent->lead->source,
                        'stage' =>  $agent->lead->stage,
                        'timeline' =>  $agent->lead->timeline,
                        'startdate' =>  $agent->lead->startdate,
                        'description' =>  $agent->lead->description,
                        'account' =>  $agent->lead->account->name,
                    ],
                    'admin' => [
                        'name' => ($agent->admin != null) ? $agent->admin->name :null
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

    public function create()
    {
        $users = User::get();
        $leads = Lead::with('account')->where('stage','!=','Job closed')->get();
        return Inertia::render('Admin/Agenttasks/Create', [
            'users' => AgentResource::collection($users),
            'leads' => LeadsResource::collection($leads),
        ]);
    }

    public function show(Agentassignment $agentassignment)
    {
        $agentassignment->load(['agent','lead.account','admin']);
        $users = User::get();
        $leads = Lead::with('account')->where('stage','!=','Job closed')->get();
        return Inertia::render('Admin/Agenttasks/Edit', [
            'task' => $agentassignment,
            'users' => AgentResource::collection($users),
            'leads' => LeadsResource::collection($leads),
            'status' => ['Completed' ,'Ongoing']
        ]);
    }

    public function store(AgentatasksRequest $request)
    {
        $lead = Agentassignment::create($request->only('user_id', 'lead_id', 'description'));

        return redirect('/agentstasks');
    }
}
