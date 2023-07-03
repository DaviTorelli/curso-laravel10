<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //* Esse método é resposável por listar dados de uma determinada tabela no banco de dados
    public function index()
    {
        if (request()->route()->named('user.index')) {
            $users = User::get();
            return view('user.index', ['users' => $users]);
        };
    }

    //* Renderiza uma view para a adição de dados ao banco de dados
    public function create()
    {
        return view('user.create');
    }

    //* Esse método injeta uma request no banco, um novo usuário nesse caso
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|min:6|max:16',
        ]);

        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('user.index');
    }

    //* Esse método traz um item específico do banco de dados com mais detalhes e exclusivamente para visualização
    public function show($user)
    {
        return view('user.show', ['user' => $user]);
    }

    //* Esse método assim como o método create, renderiza uma view para a edição do usuário, nesse caso
    public function edit($user)
    {
        return view('user.edit', ['user' => $user]);
    }

    //* Esse método atualiza um item do banco de dados, por isso trazemos dois parâmetros.
    //* Um é para representar os dados inseridos (Request) e outro para identificar o item do banco.
    public function update(Request $request, $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users|email',
        ]);

        $data = $request->only(['name', 'email']);
        $user->update($data);
        return redirect()->route('user.index');
    }

    //* Esse método deleta um item no banco de dados
    public function destroy($user)
    {
        $user->delete();
        return redirect()->back();
    }
}
