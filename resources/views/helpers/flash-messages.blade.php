@if (session('status'))
    <div class="container custom-alert">
        <div class="row justify-content-center">
            <div class="col-8">
                <div style="display: flex" class="alert alert-success justify-content-between" role="alert">
                    {{session('status')}}
                    <span class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">{!! file_get_contents('images/Close_round.svg') !!}</span>
                </div>
            </div>
        </div>
    </div>
@endif
