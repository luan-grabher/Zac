@if(!isset($card['blocked']) | (isset($card['blocked']) & $user->hasPermission($card['route'])))
    <div class="col-md-2 rounded shadow-lg px-0 m-2">
        <a href="{{route(strtolower($card['route']))}}" class="text-center">
            <img src="{{asset('images/icons/'.$card['route'].'.png')}}" class="bg-light w-100 p-3">

            <div class="card-body font-weight-bold" style="font-size:1.5vw;">
                {{__($card['route'])}}
            </div>
        </a>
    </div>
@endif

