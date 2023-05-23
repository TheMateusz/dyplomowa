@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100">
        <div class="col-11 col-lg-4 offset-0">
            <h2 class="mb-4">{{ __('main.Coś jeszcze o sobie') }}</h2>
            <h3>{{ __('main.Podaj informacje na temat swojego kraju zamieszkania oraz preferowanego wieku osób, z którymi chcesz nawiązywać kontakt. Te informacje pomogą nam lepiej Cię poznać i połączyć z innymi użytkownikami, którzy spełniają Twoje kryteria.') }}</h3>
        </div>
        <div class="col-11 col-lg-7 offset-0 offset-lg-1">
            <div class="custom-card">
                <form method="POST" class="d-flex flex-column gap-4 justify-content-center" action="{{ route('detail.update')}}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form__section">
                        <input id="year" type="number" placeholder="{{__('main.Rok urodzenia')}}" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year', $details->year ?? '') }}" required autocomplete="year" autofocus>
                        @error('year')
                        <div class="form__section--error" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__section">
                        <input id="country" type="text" placeholder="{{__('main.Kraj')}}" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country', $details->country ?? '') }}" required autocomplete="country" autofocus>
                        @error('country')
                        <div class="form__section--error" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__section">
                        <input id="city" type="text" placeholder="{{__('main.Miasto')}}" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $details->city ?? '') }}" required autocomplete="city" autofocus>
                        @error('city')
                        <div class="form__section--error" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{{__('main.Wiek maksymalny i minimalny dobieranych znajomych')}}</p>
                        </div>
                        <div class="col-6">
                            <div class="form__section">
                                <input id="min-age" type="number" placeholder="18" class="form-control @error('min-age') is-invalid @enderror" name="min-age" value="{{ old('min-age', $details->min_age ?? '') }}" required autocomplete="min-age" autofocus>
                                @error('min-age')
                                <div class="form__section--error" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form__section">
                                <input id="max-age" type="number" placeholder="65" class="form-control @error('max-age') is-invalid @enderror" name="max-age" value="{{ old('max-age', $details->max_age ?? '') }}" required autocomplete="max-age" autofocus>
                                @error('max-age')
                                <div class="form__section--error" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="{{ __('main.Zapisz') }}" class="button w-100">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-files')
    @vite(['resources/js/interests.js'])
@endsection

