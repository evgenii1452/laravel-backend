<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Авторизация</title>

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
    <h1 class="mt-4">Список мест</h1>

    <a href="{{route('place.create')}}" class="btn btn-primary">
        Создать
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Местро пребывания</th>
            <th>В работе</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($places as $place)
            <tr>
                <td>{{$place->id}}</td>
                <td>{{$place->name}}</td>
                <td>{{$place->description}}</td>
                <td>{{$place->repair}}</td>
                <td>{{$place->work ? 'Да' : 'Нет'}}</td>
                <td class="col row">
                    <a href="{{route('place.edit', ['id' => $place->id])}}" class="col btn btn-primary">
                        Изменить
                    </a>

                    <form class="col" method="POST" action="{{route('place.delete', ['id' => $place->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



</div>

</body>
</html>
