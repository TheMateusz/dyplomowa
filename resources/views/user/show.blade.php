@extends('user.layouts')
@section('content_panel')
    <div class="col-12 col-lg-4">
        <div class="panel__section panel__profile">
            <div class="panel__section__container panel__profile__container">
                <div class="panel__profile__container__title">{{ $user->name }}</div>
                <div>{{ $user->email }}</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="panel__section panel__details">
            <div class="panel__section__title panel__details__title">
                {{__('main.Podstawowe dane')}}
            </div>
            <div class="panel__section__container panel__details__container">
                <div class="d-flex gap-2 panel__details__item">
                    <div class="panel__details__item__title">{{__('main.Kraj')}}:</div>
                    <div>{{ $user->details->country }}</div>
                </div>
                <div class="d-flex gap-2 panel__details__item">
                    <div class="panel__details__item__title">{{__('main.Login')}}:</div>
                    <div>{{ $user->name }}</div>
                </div>
                <div class="d-flex gap-2 panel__details__item">
                    <div class="panel__details__item__title">{{__('main.Miasto')}}:</div>
                    <div>{{ $user->details->city }}</div>
                </div>
                <div class="d-flex gap-2 panel__details__item">
                    <div class="panel__details__item__title">{{__('main.Email')}}:</div>
                    <div>{{ $user->email }}</div>
                </div>
                <div class="d-flex gap-2 panel__details__item">
                    <div class="panel__details__item__title">{{__('main.Rok urodzenia')}}:</div>
                    <div>{{ $user->details->year }}</div>
                </div>
                <div class="d-flex gap-2 panel__details__item">
                    <div class="panel__details__item__title">{{__('main.Płeć')}}:</div>
                    <div>{{ $user->details->country }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="panel__section panel__interest">
            <div class="panel__section__title panel__interest__title">
                {{__('main.Zainteresowania')}}
            </div>
            <div class="panel__section__container">
                <div class="interests d-flex flex-wrap gap-3 align-items-center">
                    @foreach($interests as $interest)
                        <div class="interests__section form-check" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('interests.'.$interest->slug) }}">
                            <img class="interests__section__img" for="{{$interest->slug}}" src="{{ asset('images/interests/'.$interest->slug.'.png') }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="panel__section panel__post">
            <div class="panel__section__title panel__post__title">
                {{__('main.Dodane wpisy')}}
            </div>
            <div class="panel__section__container d-flex gap-3 flex-column">
                @foreach($posts as $post)
                    <div class="panel__post__container d-flex gap-2 flex-column">
                        <div class="d-flex justify-content-between">
                            <div class="panel__post__title">{{ $post->title }}</div>
                        </div>
                        <div class="panel__post__content">{{ $post->content }}</div>
                        <div class="d-flex justify-content-between">
                            <div class="panel__post__date d-flex gap-2 align-items-center">
                                {!! file_get_contents('images/Calendar_light.svg') !!}
                                {{ $post->publication_date }}
                            </div>
                            <div class="panel__post__opinions d-flex gap-2 align-items-center">
                                @auth
                                    <span class="d-flex align-items-center gap-2" data-post-id="{{ $post->id }}">
                                        <span id="likesCount_{{ $post->id }}">{{ $post->likes()->count() }}</span>
                                        <span class="like-button">{!! file_get_contents('images/happy_light.svg') !!}</span>
                                        <span class="unlike-button">{!! file_get_contents('images/Sad_light.svg') !!}</span>
                                    </span>
                                @endauth
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

