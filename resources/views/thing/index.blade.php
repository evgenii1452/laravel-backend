<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Список вещей</title>

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
    <h1 class="mt-4">Список вещей</h1>

    <a href="{{route('thing.create')}}" class="btn btn-primary">
        Создать
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Срок годности</th>
            <th>Создатель</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($things as $thing)
            <tr>
                <td>{{$thing->id}}</td>
                <td>{{$thing->name}}</td>
                <td>{{$thing->description}}</td>
                <td>{{$thing->wrnt}}</td>
                <td>{{$thing->master}}</td>
                <td class="col row">
                    <a href="{{route('thing.edit', ['id' => $thing->id])}}" class="col btn btn-primary">
                        Изменить
                    </a>

                    <form class="col" method="POST" action="{{route('thing.delete', ['id' => $thing->id])}}">
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
