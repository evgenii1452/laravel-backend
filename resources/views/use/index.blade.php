<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Вещи в использовании</title>

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
    <h1 class="mt-4">Вещи в использовании</h1>

    <a href="{{route('use.create')}}" class="btn btn-primary">
        Создать
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Вещь</th>
            <th>Место</th>
            <th>Пользватель</th>
            <th>Кол-во</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($uses as $use)
            <tr>
                <td>{{$use->id}}</td>
                <td>{{$use->thing->name}}</td>
                <td>{{$use->place->name}}</td>
                <td>{{$use->user->email}}</td>
                <td>{{$use->amount}}</td>
                <td class="col row">
                    <form class="col" method="POST" action="{{route('use.delete', ['id' => $use->id])}}">
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
