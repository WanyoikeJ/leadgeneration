<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\LeadRequest;
use App\Http\Resources\Account\AccountResource;
use App\Models\Account\Account;
use App\Models\Lead\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UpdateleadsController extends Controller
{
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
