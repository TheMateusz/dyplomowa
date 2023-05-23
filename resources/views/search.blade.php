@extends('layouts.app')
@section('content')
    <div class="main-page">
        <div class="container h-100">
            <div class="row h-100 justify-content-center">
                <div class="col-12 col-lg-12 d-flex justify-content-center align-items-center flex-column">
                    @if($mostMatchingUser)
                        <div class="col-8">
                            <div class="panel__section panel__interest">
                                <div class="panel__section__title panel__interest__title">
                                    {{__('main.Dopasowanie')}}
                                </div>
                                <div class="panel__section__container panel__details__container">
                                    <div class="d-flex gap-2 panel__details__item">
                                        <div class="panel__details__item__title">{{__('main.Procent dopasowania')}}:</div>
                                        <div>{{ round($mostMatchingUser->matchingPercentage) }} %</div>
                                    </div>
                                    <div class="d-flex gap-2 panel__details__item">
                                        <div class="panel__details__item__title">{{__('main.Wspólne zainteresowania')}}:</div>
                                        <div>{{ $mostMatchingUser->interests_count }}</div>
                                    </div>
                                </div>
                                <div class="panel__section__title panel__interest__title">
                                    {{__('main.Podstawowe informacje')}}
                                </div>
                                <div class="panel__section__container panel__details__container">
                                    <div class="d-flex gap-2 panel__details__item">
                                        <div class="panel__details__item__title">{{__('main.Kraj')}}:</div>
                                        <div>{{ $mostMatchingUser->details->country }}</div>
                                    </div>
                                    <div class="d-flex gap-2 panel__details__item">
                                        <div class="panel__details__item__title">{{__('main.Miasto')}}:</div>
                                        <div>{{ $mostMatchingUser->details->city }}</div>
                                    </div>
                                    <div class="d-flex gap-2 panel__details__item">
                                        <div class="panel__details__item__title">{{__('main.Email')}}:</div>
                                        <div>{{ $mostMatchingUser->email }}</div>
                                    </div>
                                    <div class="d-flex gap-2 panel__details__item">
                                        <div class="panel__details__item__title">{{__('main.Rok urodzenia')}}:</div>
                                        <div>{{ $mostMatchingUser->details->year }}</div>
                                    </div>
                                </div>
                                <div class="panel__section__title panel__interest__title">
                                    {{__('main.Zainteresowania')}}
                                </div>
                                <div class="panel__section__container">
                                    <div class="interests d-flex flex-wrap gap-3 align-items-center">
                                        @foreach($mostMatchingUser->interests as $interest)
                                            <div class="interests__section form-check" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$interest->name}}">
                                                <img class="interests__section__img" for="{{$interest->slug}}" src="{{ asset('images/interests/'.$interest->slug.'.png') }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>{{__('main.Brak podobnych użytkowników.')}}</p>
                    @endif
                    <form method="POST">
                        @csrf
                        <button type="submit" class="button button--big">{{ __('main.Znajdź') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

