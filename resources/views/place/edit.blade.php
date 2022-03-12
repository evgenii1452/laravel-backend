<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Обновление места: {{$place->name}}</title>

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
    <h1 class="mt-4">Обновление места: {{$place->name}}</h1>

    <form class="col-3 p-3 offset-4 border rounded" method="POST" action="{{ route('place.update', ['id' => $place->id]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name" class="col-form-label-lg">Название</label>
            <input type="name" class="form-control"
                   id="name"
                   value="{{$place->name}}"
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
                   value="{{$place->description}}"
                   name="description"
                   placeholder="Описание"
            >
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="repair" class="col-form-label-lg">Место пребывания</label>
            <input type="repair"
                   class="form-control"
                   id="repair"
                   value="{{$place->repair}}"
                   name="repair"
                   placeholder="ремонт/мойка"
            >
            @error('repair')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="col-form-label-lg">В работе</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input"
                       type="radio"
                       name="work"
                       id="work-true"
                       value="1"
                       {{!$place->work ?: "checked"}}
                >
                <label class="form-check-label" for="work-true">Да</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input"
                       type="radio"
                       name="work"
                       id="work-false"
                       value="0"
                       {{$place->work ?: "checked"}}
                >
                <label class="form-check-label" for="work-false">Нет</label>
            </div>
        </div>

        <div class="form-group mt-3">
            <button type="submit"
                    class="btn btn-lg btn-primary"
            >Обновить</button>
        </div>
    </form>
</div>

</body>
</html>
