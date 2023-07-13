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
                <input type="text" value="{{ $user->name }}"
                    class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" value="{{ $user->email }}"
                    class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    aria-describedby="emailHelp">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <h6 class="mt-3">Editar senha</h6>
            <div class="form-group">
                <label for="old_password">Senha</label>
                <input type="password" class="form-control @error('old_password') is-invalid @enderror "
                    id="old_password" name="old_password" value="{{ old('old_password') }}">
                @error('old_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password">Nova Senha</label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror "
                    id="new_password" name="new_password" value="{{ old('new_password') }}">
                @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
