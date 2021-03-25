@if (config('app.enable_facebook'))
    <div class="container">
        <div class="fb-like" data-href="{{Request::url()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
        <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
    </div>
@endif
