<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-3 row">
            <div class="d-flex align-items-center justify-content-between">
                <h1>Lista de Usuários</h1>
                <a type="button" class="btn btn-primary px-4 py-2" style="border-radius: 14px"
                    href="{{ route('user.create') }}">Adicionar Usuário</a>
            </div>
        </div>
        <div class="my-3">
            <div class="p-1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                            <table class="table manage-candidates-top mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dados Básicos</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="candidates-list">
                                            <td scope="row">{{ $user->id }}</td>
                                            <td class="title">
                                                <div class="candidate-list-details">
                                                    <div class="candidate-list-info">
                                                        <div class="candidate-list-title">
                                                            <h5 class="mb-0">{{ $user->name }}
                                                            </h5>
                                                        </div>
                                                        <div class="candidate-list-option">
                                                            <ul class="list-unstyled">
                                                                <li><i
                                                                        class="fas fa-map-marker-alt pr-1"></i>{{ $user->email }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled mb-0 d-flex justify-content-center">
                                                    <a type="button" href="{{ route('user.show', $user->id) }}"
                                                        class="mx-1 btn btn-success">VER</a>
                                                    <a type="button" href="{{ route('user.edit', $user->id) }}"
                                                        class="mx-1 btn btn-warning">EDITAR</a>
                                                    <form method="post"
                                                        action="{{ route('user.destroy', $user->id) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="mx-1 btn btn-danger">DELETAR</button>
                                                    </form>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
