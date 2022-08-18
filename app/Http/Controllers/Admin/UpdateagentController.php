<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UpdateagentController extends Controller
{
    public function update(Request $request, Agent $agent)
    {
        $agent->name = $request->name;
        $agent->save();

        return Redirect::back()->with('success', 'Agent was updated successfully.');
    }
}
