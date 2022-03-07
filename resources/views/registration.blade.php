<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Регистрация</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

@error('formError')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="container">
    <h1 class="mt-4">Регистрация</h1>

    <form class="col-3 p-3 offset-4 border rounded" method="POST" action="{{ route('user.registration') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label-lg">Ваш email</label>
            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label-lg">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Пароль">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-lg btn-primary" value="1" name="sendMe">Зарегистрироваться</button>
        </div>
    </form>
</div>

</body>
</html>
