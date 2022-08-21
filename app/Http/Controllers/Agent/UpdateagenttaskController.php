<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent\Agentassignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UpdateagenttaskController extends Controller
{
    public function update(Request $request, Agentassignment $agentassignment)
    {
        $agentassignment->user_id = $request->user_id;
        $agentassignment->lead_id = $request->lead_id;
        $agentassignment->description = $request->description;
        // status
        if($request->filled('status')){
            if ($request->status == 'Completed') {
                $status = false;
            }else {
                $status = true;
            }
            $agentassignment->status = $status;
        }
        $agentassignment->save();

        return redirect('/agentstasks')->with('success', 'Agent was updated successfully.');

        // return Redirect::back()->with('success', 'Agent was updated successfully.');
    }
}
