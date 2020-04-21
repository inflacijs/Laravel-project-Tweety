@if(Session::has('flash_message'))
    <div class="alert alert-success text-center">
        <em> {!! session('flash_message') !!}</em>
    </div>
@endif

<x-app>
    <div>
        @include ('_publish-tweet-panel')
                
        @include ('_timeline')
    </div>
</x-app>
