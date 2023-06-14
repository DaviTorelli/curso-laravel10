<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="mt-3 row">
            <h1>Editar usuário</h1>
        </div>
        <form method="post" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email"
                    aria-describedby="emailHelp">
            </div>
            <div class="mt-3 row">
                <div class="d-flex align-items-center justify-content-between">
                    <a type="button" class="btn btn-secondary mt-3" href="{{ route('user.index') }}">Voltar</a>
                    <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
