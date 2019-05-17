@extends('layouts.app')

@section('content')

    <div id="box_registration" class="box">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Вход</h1>

            <input placeholder="Email" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input  placeholder="Пароль" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input type="submit" name="do_login" value="Вход">

            <div style="color: white">
                Запомнить <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            </div>
        </form>
        <input id="btn" type="submit" value="Регистрация" data-toggle="modal" data-target="#exampleModal">

        @if (Route::has('password.request'))
            <a id="link1" href="{{ route('password.request') }}">
                Забыл пароль!
            </a>
        @endif
    </div>





    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div>
                        <form id="brm" class="box" method="POST" action="{{ route('register') }}">
                            @csrf
                            <h1>Регистрация</h1>

                            <input placeholder="Ваше Имя" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input placeholder="Ваш Email" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                            <input placeholder="Пароль" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input placeholder="Подтвердите Пароль" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            <input type="submit"  value="Регистрация">
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection