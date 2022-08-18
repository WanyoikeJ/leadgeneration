<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\LeadRequest;
use App\Http\Resources\Account\AccountResource;
use App\Models\Account\Account;
use App\Models\Lead\Lead;
use Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LeadsController extends Controller
{
    public function index()
    {
        return Inertia::render('Leads/Index', [
            'leads' => Lead::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('source', 'like', "%{$search}%");
                })
                ->with(['user','account'])
                ->paginate(10)
                ->withQueryString()
                ->through(fn($lead) => [
                    'id' => $lead->id,
                    'stage' => $lead->stage,
                    'source' => $lead->source,
                    'timeline' => $lead->timeline,
                    'startdate' => $lead->startdate,
                    'user' => [
                        'name' => $lead->user->name
                    ],
                    'account' => [
                        'name' => $lead->account->name
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

    public function show(Lead $lead)
    {
        $lead->load(['user','account']);
        $account = Account::where('status', true)->get();
        return Inertia::render('Leads/Edit', [
            'lead' => $lead,
            'acount' => AccountResource::collection($account),
            'stages' => ['Discovery','Proposal shared','Negotiations','Job started','Job closed']
        ]);
    }

    public function create()
    {
        $account = Account::where('status', true)->get();
        return Inertia::render('Leads/Create', [
            'acount' => AccountResource::collection($account),
            'stages' => ['Discovery','Proposal shared','Negotiations','Job started','Job closed']
        ]);
    }

    public function store(LeadRequest $request)
    {
        $lead = Lead::create($request->only('accounts_id', 'description', 'stage', 'source', 'timeline', 'startdate'));

        return redirect('/leads');
    }

    public function update(Request $request, Lead $lead)
    {
        $lead->stage = $request->stage;
        $lead->source = $request->source;
        $lead->timeline = $request->timeline;
        $lead->startdate = $request->startdate;
        $lead->description = $request->description;
        $lead->save();

        return Redirect::back()->with('success', 'Lead was updated successfully.');
    }
}
