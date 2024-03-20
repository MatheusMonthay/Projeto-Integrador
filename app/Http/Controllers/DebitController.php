<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class DebitController extends Controller
{
    public function index()
    {
        $data = [];
        return view('accounts.debit', $data);
    }
    public function addDebit (Request $request){
        $values = $request->all();
        $credit = new Account();
        $credit->fill($values);

        $credit->save();       

        return redirect()->route("dashboard");
    }
}