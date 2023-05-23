@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100">
        <div class="col-11 col-lg-5 offset-0">
            <div class="custom-card">
                <form method="POST" class="d-flex flex-column gap-4 justify-content-center" action="{{ route('register') }}">
                    @csrf

                    <div class="form__section">
                        <input id="name" type="text" placeholder="{{__('main.Login')}} *" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <div class="form__section--error" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form__section">
                        <input id="email" type="email" placeholder="{{__('main.Email')}} *" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <div class="form__section--error" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form__section">
                        <input id="password" type="password" placeholder="{{__('main.Hasło')}} *" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <div class="form__section--error" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form__section">
                        <input id="password-confirm" type="password" placeholder="{{__('main.Powtórz hasło')}} *" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <input type="submit" value="Stwórz konto" class="button">

                    <div class="form__section">
                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <span>{{__('main.Posiadasz już konto ?')}}</span>
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="button button--thin">{{ __('main.Zaloguj się') }}</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-11 col-lg-4 offset-0 offset-lg-1">
            <h2 class="mb-4">{{__('main.Rejestracja')}}</h2>
            <h3>{{__('main.Wprowadź podstawowe informacje, aby rozpocząć proces rejestracji. Pola oznaczone gwiazdką (*) są
                wymagane. Po wypełnieniu formularza kliknij przycisk Zarejestruj się, aby przejść do kolejnego etapu.')}}</h3>
        </div>
    </div>
</div>
@endsection
