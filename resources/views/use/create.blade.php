<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Создание вещей</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@include('navbar')

@error('formError')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="container">
    <h1 class="mt-4">Создание вещей</h1>

    <form class="col-3 p-3 offset-4 border rounded" method="POST" action="{{ route('use.store') }}">
        @csrf

        <div class="form-group">
            <label for="thing" class="col-form-label-lg">Вещь</label>
            <select class="form-select" id="thing" name="thing_id" aria-label="Default select example">
                <option selected>Open this select menu</option>

                @foreach($things as $thing)
                    <option value="{{$thing->id}}">{{$thing->name}}</option>
                @endforeach
            </select>
            @error('thing_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="thing" class="col-form-label-lg">Место</label>
            <select class="form-select" id="place" name="place_id" aria-label="Default select example">
                <option selected>Open this select menu</option>

                @foreach($places as $place)
                    <option value="{{$place->id}}">{{$place->name}}</option>
                @endforeach
            </select>
            @error('place_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="thing" class="col-form-label-lg">Пользователь</label>
            <select class="form-select" id="user" name="user_id" aria-label="Default select example">
                <option selected>Open this select menu</option>

                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->email}}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="col-form-label-lg">Кол-во</label>
            <input type="number"
                   class="form-control"
                   id="amount"
                   value=""
                   name="amount"
            >
            @error('amount')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit"
                    class="btn btn-lg btn-primary"
            >Создать</button>
        </div>
    </form>
</div>

</body>
</html>
