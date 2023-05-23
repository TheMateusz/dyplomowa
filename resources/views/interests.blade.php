@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100">
        <div class="col-11 col-lg-4 offset-0">
            <h2 class="mb-4">{{__('main.Twoje zainteresowania')}}</h2>
            <h3>{{__('main.Podaj informacje na temat swoich zainteresowań, abyśmy mogli dostarczać Ci treści, które Cię interesują. Możesz wybrać z listy lub wpisać swoje własne zainteresowania. Te informacje pomogą nam lepiej Cię poznać i dostosować nasze usługi do Twoich potrzeb.')}}</h3>
        </div>
        <div class="col-11 col-lg-7 offset-0 offset-lg-1">
            <div class="custom-card">
                <form method="POST" class="d-flex flex-column gap-4 justify-content-center" action="{{ route('interest.update')}}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="interests d-flex flex-wrap gap-4 justify-content-between align-items-center">
                        @foreach($interests as $interest)
                            <div class="interests__section form-check" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$interest->name}}">
                                <img class="interests__section__img" for="{{$interest->slug}}" src="{{ asset('images/interests/'.$interest->slug.'.png') }}">
                                <input class="interests__section__input" type="checkbox" id="{{$interest->slug}}" name="hobby[]" value="{{$interest->id}}" {{ $selectedInterests->contains('id', $interest->id) ? 'checked' : '' }}>
                            </div>
                        @endforeach
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

