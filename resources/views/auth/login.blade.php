@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100">
        <div class="col-11 col-lg-4 offset-0">
            <h2 class="mb-4">{{ __('main.Login') }}</h2>
            <h3>{{ __('main.Proszę wprowadzić swoje dane uwierzytelniające, aby uzyskać dostęp do panelu. W przypadku problemów z logowaniem skontaktuj się z administratorem systemu.') }}</h3>
        </div>
        <div class="col-11 col-lg-5 offset-0 offset-lg-1">
            <div class="custom-card">
                <form method="POST" class="d-flex flex-column gap-4 justify-content-center" action="{{ route('login') }}">
                    @csrf
                    <div class="form__section">
                        <input id="email" placeholder="{{__('main.Email')}}" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <div class="form__section--error" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form__section">
                        <input id="password" placeholder="{{__('main.Hasło')}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <div class="form__section--error" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" value="{{ __('main.Zaloguj') }}" class="button w-100">
                    <div class="form__section">
                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <span> {{__('main.Nie posiadasz jeszcze konta ?')}} </span>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="button button--thin">{{ __('main.Stwórz konto') }}</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
