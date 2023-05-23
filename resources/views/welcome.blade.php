@extends('layouts.app')
@section('content')
    <div class="main-page">
        <div class="container h-100">
            <div class="row h-100 justify-content-center">
                <div class="col-12 col-lg-12 d-flex justify-content-center align-items-center flex-column">
                    <h1 class="mb-2 mb-lg-4">{{__('main.Find Friends')}}</h1>
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="button button--big">{{ __('main.Zaloguj') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
