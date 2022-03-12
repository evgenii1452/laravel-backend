<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        @if(\Illuminate\Support\Facades\Auth::check())

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('thing.index')}}">Список вещей</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('place.index')}}">Список мест</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('use.index')}}">Вещи в использовании</a>
                    </li>
                </ul>
            </div>


            {{ \Illuminate\Support\Facades\Auth::user()['email'] }}
            <a href="{{ route('user.logout') }}"><button type="button" class="btn btn-dark">Выйти</button></a>
        @else
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <a href="{{ route('user.login') }}"><button type="button" class="btn btn-light" >Авторизация</button></a>
                <a href="{{ route('user.registration') }}"><button type="button" class="btn btn-dark">Регистрация</button></a>
            </div>
        @endif
    </nav>
</div>
