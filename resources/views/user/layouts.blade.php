@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 position-relative">
                <div class="panel__sticky">
                    <div class="panel__section panel__friends">
                        <div class="panel__section__title panel__friends__title">{{__('main.Dobrane osoby')}}</div>
                        <div class="panel__section__container panel__friends__container">
                            <div class="panel__friends__list d-flex flex-column gap-1">
                                @foreach($friends as $friend)
                                    <div class="panel__friends__item d-flex align-items-center gap-2 d-flex justify-content-between">
                                        <a href="/user/{{ $friend->id }}">{{ $friend->name }} </a>
                                        <div class="">
{{--                                            <span class="panel__friends__messages">{{ $friend->messages_count }}</span>--}}
                                            <span class="user panel__friends__button" id="{{ $friend->id }}">{!! file_get_contents('images/Send_light.svg') !!}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="messages"></div>
                </div>
            </div>
            <div class="col-12 col-lg-9 mt-3">
                <div class="row d-flex">
                    @yield('content_panel')
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
@section('javascript')
@endsection
@section('js-files')
    @vite(['resources/js/delete.js'])
    @vite(['resources/js/edit-post.js'])
    @vite(['resources/js/chat.js'])
@endsection


