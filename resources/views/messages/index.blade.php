<div class="panel__section__title panel__chat__title">{{$user->name}}</div>
<div class="panel__section__container panel__chat__container">
    <div class="panel__chat__container__wrapper">
        @foreach($messages as $message)
            <div class="panel__chat__container__message {{ ($message->from == Auth::id()) ? 'panel__chat__container__message--sent' : 'panel__chat__container__message--received' }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ date('d M y, h:i a', strtotime($message->created_at)) }}">
                <div class="panel__chat__container__message__avatar">
                    @if(($message->from == Auth::id()))
                        @if ($me->details->avatar)
                            @if(!is_null($me->details->avatar))<img src="{{ asset('storage/'.$me->details->avatar) }}">@endif
                        @else
                            <img src="{{ asset('images/mezczyzna.png') }}" alt="Default Avatar">
                        @endif
                    @else
                        @if ($user->details->avatar)
                            @if(!is_null($user->details->avatar))<img src="{{ asset('storage/'.$user->details->avatar) }}">@endif
                        @else
                            <img src="{{ asset('images/mezczyzna.png') }}" alt="Default Avatar">
                        @endif
                    @endif
                </div>
                <div class="panel__chat__container__message__content">
                    {{ $message->message }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="panel__chat__container__input">
        <input type="text" name="message">
    </div>
</div>

