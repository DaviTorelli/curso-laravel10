<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (request()->route()->named('user.index')) {
            $users = User::get();
            return view('user.index', ['users' => $users]);
        };
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('user.index');
    }

    public function show($user)
    {
        return view('user.show', ['user' => $user]);
    }

    public function edit($user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $user)
    {
        $data = $request->only(['name', 'email']);
        $user->update($data);
        return redirect()->route('user.index');
    }

    public function destroy($user)
    {
        $user->delete();
        return redirect()->back();
    }
}
