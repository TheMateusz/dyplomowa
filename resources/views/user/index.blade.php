@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 position-relative">
                <div class="panel__section panel__friends">
                    <div class="panel__section__title panel__friends__title">{{__('main.Dobrane osoby')}}</div>
                    <div class="panel__section__container panel__friends__container">
                        <div class="panel__friends__list d-flex flex-column gap-1">
                            @foreach($friends as $friend)
                                <div class="panel__friends__item d-flex align-items-center gap-2"><a href="/user/{{ $friend->id }}">{{ $friend->name }} </a><span class="panel__friends__messages">{{ $friend->messages_count }}</span></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 mt-3">
                <div class="row d-flex">
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
                                {{__('main.Podstawowe dane') }}
                                <a href="{{ route('detail.index') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ustawienia podstawowych danych" class="menu__link">{!! file_get_contents('images/Edit_light.svg') !!}</a>
                            </div>
                            <div class="panel__section__container panel__details__container">
                                <div class="d-flex gap-2 panel__details__item">
                                    <div class="panel__details__item__title">{{__('main.Kraj') }}:</div>
                                    <div>{{ $user->details->country }}</div>
                                </div>
                                <div class="d-flex gap-2 panel__details__item">
                                    <div class="panel__details__item__title">{{__('main.Nazwa') }}:</div>
                                    <div>{{ $user->name }}</div>
                                </div>
                                <div class="d-flex gap-2 panel__details__item">
                                    <div class="panel__details__item__title">{{__('main.Miasto') }}:</div>
                                    <div>{{ $user->details->city }}</div>
                                </div>
                                <div class="d-flex gap-2 panel__details__item">
                                    <div class="panel__details__item__title">{{__('main.Email') }}:</div>
                                    <div>{{ $user->email }}</div>
                                </div>
                                <div class="d-flex gap-2 panel__details__item">
                                    <div class="panel__details__item__title">{{__('main.Rok urodzenia') }}:</div>
                                    <div>{{ $user->details->year }}</div>
                                </div>
                                <div class="d-flex gap-2 panel__details__item">
                                    <div class="panel__details__item__title">{{__('main.Płeć') }}:</div>
                                    <div>{{ $user->details->country }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="panel__section panel__interest">
                            <div class="panel__section__title panel__interest__title">
                                {{__('main.Zainteresowania') }}
                                <a href="{{ route('interest.index') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ustawienia zainteresowań" class="menu__link">{!! file_get_contents('images/Edit_light.svg') !!}</a>
                            </div>
                            <div class="panel__section__container">
                                <div class="interests d-flex flex-wrap gap-3 align-items-center">
                                    @foreach($interests as $interest)
                                        <div class="interests__section form-check" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$interest->name}}">
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
                                            <div class="panel__post__options">
                                        <span data-id="{{$post->id}}" class="panel__post__options__edit edit-post" data-bs-toggle="modal" data-bs-target="#editModal">
                                            {!! file_get_contents('images/Edit_light_black.svg') !!}
                                        </span>
                                                <span data-id="{{$post->id}}" class="panel__post__options__delete delete">
                                            {!! file_get_contents('images/Trash_light.svg') !!}
                                        </span>
                                            </div>
                                        </div>
                                        <div class="panel__post__content">{{ $post->content }}</div>
                                        <div class="d-flex justify-content-between">
                                            <div class="panel__post__date d-flex gap-2 align-items-center">
                                                {!! file_get_contents('images/Calendar_light.svg') !!}
                                                {{ $post->publication_date }}
                                            </div>
                                            <div class="panel__post__opinions d-flex gap-2 align-items-center">
                                                @auth
                                                    @if(!$post->likes()->where('user_id', auth()->user()->id)->exists())
                                                        <span class="like-button d-flex align-items-center gap-2" data-post-id="{{ $post->id }}">
                                                    <span id="likesCount_{{ $post->id }}">{{ $post->likes()->count() }}</span>
                                                    {!! file_get_contents('images/happy_light.svg') !!}
                                                </span>
                                                    @else
                                                        <span class="unlike-button d-flex align-items-center gap-2" data-post-id="{{ $post->id }}">
                                                    <span id="likesCount_{{ $post->id }}">{{ $post->likes()->count() }}</span>
                                                    {!! file_get_contents('images/Sad_light.svg') !!}
                                                </span>
                                                    @endif
                                                @endauth
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                <a href class="button" data-bs-toggle="modal" data-bs-target="#createModal">{{__('main.Dodaj nowy wpis')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex mb-2 mb-lg-3 justify-content-end"><div data-bs-dismiss="modal" aria-label="Close">{!! file_get_contents('images/Close_round.svg') !!}</div></div>
                    <form method="POST" class="d-flex flex-column gap-4 justify-content-center" action="{{ route('post.store')}}">
                        {{ method_field('PUT') }}
                        @csrf
                        <input type="hidden" name="id" value="" id="post-id">
                        <div class="form__section">
                            <input id="title" type="text" placeholder="Tytuł wpisu" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="title" autofocus>
                            @error('title')
                            <div class="form__section--error" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form__section">
                            <textarea id="content" rows="5" placeholder="Treść wpisu" class="form-control @error('content') is-invalid @enderror" name="content" required autocomplete="content" autofocus></textarea>
                            @error('content')
                            <div class="form__section--error" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="submit" value="{{ __('main.Zapisz') }}" class="button w-100">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex mb-2 mb-lg-3 justify-content-end"><div data-bs-dismiss="modal" aria-label="Close">{!! file_get_contents('images/Close_round.svg') !!}</div></div>
                    <form method="POST" class="d-flex flex-column gap-4 justify-content-center" action="{{ route('post.store')}}">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form__section">
                            <input id="title" type="text" placeholder="Tytuł wpisu" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $details->title ?? '') }}" required autocomplete="title" autofocus>
                            @error('title')
                            <div class="form__section--error" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form__section">
                            <textarea id="content" rows="5" placeholder="Treść wpisu" class="form-control @error('content') is-invalid @enderror" name="content" required autocomplete="content" autofocus>{{ old('content', $details->message ?? '') }}</textarea>
                            @error('content')
                            <div class="form__section--error" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="submit" value="{{ __('main.Dodaj') }}" class="button w-100">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
@section('js-files')
    @vite(['resources/js/delete.js'])
    @vite(['resources/js/edit-post.js'])
@endsection


