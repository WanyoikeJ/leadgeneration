<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UpdateaccountController extends Controller
{
    public function update(Request $request, Account $account)
    {
        $account->name = $request->name;
        $account->email = $request->email;
        $account->save();

        return Redirect::back()->with('success', 'Account was updated successfully.');
    }
}
