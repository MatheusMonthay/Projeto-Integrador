<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Service\UserService;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        return view('login.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser(Request $request)
    {
        //pega os dados do formulario de cadastro do usuario
        $values = $request->all();
        $user = new User();
        $user->fill($values);

        $password = $request->input("password", "");
        $user->password = Hash::make($password);

        $userService = new UserService;
        $result = $userService->createUser($user);
        
        $message = $result["message"];
        $status = $result["status"];

        $request->session()->flash($status, $message);

        return redirect()->route("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}