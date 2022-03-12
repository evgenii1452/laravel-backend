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

    <form class="col-3 p-3 offset-4 border rounded" method="POST" action="{{ route('thing.store') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label-lg">Название</label>
            <input type="name"
                   class="form-control"
                   id="name"
                   value=""
                   name="name"
                   placeholder="Название"
            >
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="col-form-label-lg">Описание</label>
            <input type="description"
                   class="form-control"
                   id="description"
                   value=""
                   name="description"
                   placeholder="Описание"
            >
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="wrnt" class="col-form-label-lg">Срок годности</label>
            <input type="wrnt"
                   class="form-control"
                   id="wrnt"
                   value=""
                   name="wrnt"
                   placeholder="DD-MM-YYYY"
            >
            @error('wrnt')
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
