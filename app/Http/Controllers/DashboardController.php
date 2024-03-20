<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        $data = [];
        $iduser = Auth::user()->id;

        $query = Account::where('id_user', $iduser);

        // Filtro de datas
        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $query->whereBetween('dt_cad', [$request->input('data_inicio'), $request->input('data_fim')]);
        }

        // Filtro por tipo
        if ($request->filled('tipo')) {
            $query->where('type', $request->input('tipo'));
        }

        // Filtro por categoria
        if ($request->filled('categoria')) {
            $query->where('category', 'like', '%' . $request->input('categoria') . '%');
        }

        // Obtém os resultados
        $list = $query->orderBy('dt_cad', 'asc')->get();

        $data['list'] = $list;

        return view('user.dashboard', $data);
    }
    
    public function destroy($id){
        Account::find($id)->delete();
        return redirect()->route("dashboard");
    }
  
    public function edit($id){
        $account = Account::find($id);
        
        return view('accounts.edit', ['id' => $id], compact('account'));
    }

    public function update(Request $request, $id){
        $account = Account::find($id);
    
        $account->update($request->all());
    
        return redirect()->route("dashboard");
    }
}