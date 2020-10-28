@extends('layouts.app')
@section('title', 'Авторизация')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Ваш E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить') }}
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Войти') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                                <li style="list-style-type:none; margin-top: 50px;">
                                  <button type="button" class="btn btn-primary mx-auto bg-dark">
                                  <a class="text-white" href="{{ route('vklogin') }}">Авторизоваться через VK</a>
                                </button>
                                </li>
                                <li style="list-style-type:none; margin-top: 10px;">
                                  <button type="button" class="btn btn-primary mx-auto bg-dark">
                                  <a class="text-white" href="{{ route('gitlogin') }}">Авторизоваться через GitHub</a>
                                </button>
                                </li>
                            </div>
                        </div>
                        <div class="form-group row mb-5" style="border-bottom: 1px solid #d4d4d4; margin-right: 120px;
    margin-left: 130px"></div>
                        <div class="form-group row mb-0">
                          <button type="button" class="btn btn-primary mx-auto">
                              <a class="text-white" href="{{ route('register') }}">{{ __('Создать аккаунт') }}</a>
                          </button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
