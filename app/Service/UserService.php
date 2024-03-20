<?php

namespace App\Service;


use App\Models\User;
use Illuminate\Support\Facades\Log;


class UserService {
    public function createUser(User $user){
        try{
            $dbUsuario =User::where("email", $user->email)->first();
            if($dbUsuario){
                return ['status'=> 'err','message'=>'Email já cadastrado'];
            }
            $usuarioCpf =User::where("cpf", $user->cpf)->first();
            if($usuarioCpf){
                return ['status'=> 'err','message'=>'CPF já cadastrado'];
            }
            $user->save();
            return ['status'=> 'ok','message'=>'Usuario cadastrado com sucesso'];
        }
        catch(\Exception $e){
            Log::error("ERRO", ['file'=> 'UserService.createUser', 'message'=> $e->getMessage()]);
            return ['status'=> 'err','message'=>'Não foi possivel cadastrar o usuario'];
        }
    }
}