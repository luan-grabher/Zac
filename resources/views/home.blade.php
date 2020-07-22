@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @component('layouts.home-card-link')
                @slot('route') robots @endslot
                @slot('permission') read_robots @endslot
                @slot('icon') robots @endslot
                @slot('name') Robôs @endslot
            @endcomponent

            @component('layouts.home-card-link')
                @slot('route') tasks @endslot
                @slot('permission') browse_tasks @endslot
                @slot('icon') tasks @endslot
                @slot('name') Tarefas @endslot
            @endcomponent

            @component('layouts.home-card-link')
                @slot('route') voyager.dashboard @endslot
                @slot('permission') browse_admin @endslot
                @slot('icon') admin @endslot
                @slot('name') {{__('Admin')}} @endslot
            @endcomponent


            @component('layouts.home-card-link')
                @slot('route') notices @endslot
                @slot('permission') browse_notices @endslot
                @slot('icon') notices @endslot
                @slot('name') {{__('Notices')}} @endslot
            @endcomponent

            @component('layouts.home-card-link')
                @slot('route') overtime_calendar @endslot
                @slot('permission') browse_overtime_calendar @endslot
                @slot('icon') overtime_calendar @endslot
                @slot('name') {{__('overtime_calendar')}} @endslot
            @endcomponent

            @component('layouts.home-card-link')
                @slot('route') birthday_messages @endslot
                @slot('permission') browse_birthday_messages @endslot
                @slot('icon') birthday_messages @endslot
                @slot('name') {{__('birthday_messages')}} @endslot
            @endcomponent

        </div>
    </div>
@endsection
