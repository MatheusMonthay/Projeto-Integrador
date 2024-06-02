<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreditController extends Controller
{
    public function index()
    {
        $data = [];
        return view('accounts.add', $data);
    }

    public function addCredit(Request $request, User $user)
    {
        // Validar os dados diretamente no método
        $validator = Validator::make($request->all(), [
            'balance' => 'required|numeric|min:0', // balance deve ser numérico e não negativo
            'category' => 'required|string',
            'description' => 'nullable|string',
            'dt_cad' => 'required|date|before_or_equal:today',
            'id_user' => 'required|integer',
            'type' => 'required|string',
        ], [
            'balance.required' => 'O campo saldo é obrigatório.',
            'balance.numeric' => 'O saldo deve ser numérico.',
            'balance.min' => 'O saldo não pode ser negativo.',
            'category.required' => 'O campo categoria é obrigatório.',
            'category.string' => 'A categoria deve ser uma string.',
            'dt_cad.required' => 'O campo data é obrigatório.',
            'dt_cad.date' => 'A data deve ser uma data válida.',
            'dt_cad.before_or_equal' => 'A data não pode ser futura.',
            'id_user.required' => 'O campo ID do usuário é obrigatório.',
            'id_user.integer' => 'O ID do usuário deve ser um número inteiro.',
            'type.required' => 'O campo tipo é obrigatório.',
            'type.string' => 'O tipo deve ser uma string.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Preencher os valores do modelo Account
            $credit = new Account();
            $credit->fill($request->all());

            // Salvar o modelo no banco de dados
            $credit->save();

            // Redirecionar para a rota 'dashboard'
            return redirect()->route("dashboard")->with('success', 'Saldo adicionado com sucesso.');
        } catch (\Exception $e) {
            // Tratar qualquer erro inesperado
            return redirect()->back()->with('error', 'Não foi possível adicionar o saldo.')->withInput();
        }
    }
}