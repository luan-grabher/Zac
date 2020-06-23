@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @php $card = ['route'=>'Robots', 'permission'=> 'read_robots']; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'Tasks']; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'overtime_calendar']; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'Notices','permission'=>'browse_notices']; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'birthday_messages','blocked'=>true]; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'admin','blocked'=>true]; @endphp
            @include('layouts.home-card-link')
        </div>
    </div>
@endsection
