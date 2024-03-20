<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Database\Factories\AccountFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // obtem todos os usuários existentes no banco de dados
        $users = User::all();
        
        // Cria 10 contas para cada usuário
        $users->each(function ($user) {
            AccountFactory::new()->count(10)->create(['id_user' => $user->id]);
        });
    }
}