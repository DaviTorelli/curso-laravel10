<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //* Inspecionando a rota
        if (request()->route()->named('user.index')) {
            $users = User::get();
            return view('user.index', ['users' => $users]);
        };
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        //* Nesse caso, redirecionamos para uma URI específica, passando seu _path_
        // return redirect()->to('/users');

        //* Já nesse caso, redirecionamos para o ->name() da rota, passado no arquivo web.php
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        //* Aplicando injeção de dependência
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        $data = $request->only(['name', 'email']);
        $user->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $user->delete();
        return redirect()->back();
    }
}
