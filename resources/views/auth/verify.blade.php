@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100">
        <div class="col-11 col-lg-4 offset-0">
            <h2 class="mb-4">{{__('main.Zweryfikuj email')}}</h2>
            <h3>{{__('main.Przed kontynuowaniem, sprawdź swój e-mail w celu potwierdzenia swoje konta. Jeśli nie otrzymałeś e-maila, kliknij przycisk obok.')}}</h3>
        </div>
        <div class="col-11 col-lg-5 offset-0 offset-lg-1">
            <div class="custom-card">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <form method="POST" class="d-flex flex-column gap-4 justify-content-center" action="{{ route('verification.resend') }}">
                    @csrf
                    <input type="submit" value="{{ __('main.Prześlij kod ponownie') }}" class="button w-100">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
