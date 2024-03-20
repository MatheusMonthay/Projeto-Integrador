<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $data = [];
        return view('accounts.add', $data);
    }
    public function addCredit (Request $request, User $user){
        $values = $request->all();
        $credit = new Account();
        $credit->fill($values);

        $credit->save();       

        return redirect()->route("dashboard");
    }
}