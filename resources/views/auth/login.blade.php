@extends('layouts.app')

@section('title', 'login')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-mr-auto">
            <div class="container text-center logo">
                <img src="/img/1.png" alt="">
            </div>
            <div class="container as" style="background-color: white">
                <div class="text-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="container clgn">
                            <h3 class="lgn">EVOTING</h3>
                        </div>

                        <div class="form-group text-center spnemail">
                            <div class="row">
                                <label for="email" class="col">{{ __('E-Mail Atau NIK') }}</label>
                            </div>

                            <div class="row text-center">
                                <div class="col"></div>
                                <div class="col form-horizontal text-center">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>

                        <div class="form-group border-0 text-center spnpassword">
                            <div class="row">
                                <label for="password" class="col">{{ __('Password') }}</label>
                            </div>

                            <div class="row text-center">
                                <div class="col"></div>
                                <div class="col form-horizontal">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="container cn">
                                <button type="submit" class="btn btn-primary tmbl">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="container lppswrd">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Lupa Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection