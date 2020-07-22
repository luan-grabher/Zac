@if(isset($route) && isset($permission) && isset($icon) && isset($name))
    @if(Auth::user()->hasPermission($permission))
        <div class="col-md-2 rounded shadow-lg px-0 m-2">
            <a href="{{route(strtolower($route))}}" class="text-center">
                <img src="{{asset('images/icons/'.$icon.'.png')}}" class="bg-light w-100 p-3">

                <div class="card-body font-weight-bold" style="font-size:1.5vw;">
                    {{$name}}
                </div>
            </a>
        </div>
    @endif
@endif

