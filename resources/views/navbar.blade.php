<nav class="navbar navbar-expand-lg navbar-light bg-light">
    @if(\Illuminate\Support\Facades\Auth::check())
        {{ \Illuminate\Support\Facades\Auth::user()['email'] }}
        <a href="{{ route('user.logout') }}"><button type="button" class="btn btn-dark">Выйти</button></a>
    @else
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <a href="{{ route('user.login') }}"><button type="button" class="btn btn-light" >Авторизация</button></a>
            <a href="{{ route('user.registration') }}"><button type="button" class="btn btn-dark">Регистрация</button></a>
        </div>
    @endif
</nav>
