@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-100 align-content-center">
            <button type="button" class="btn btn-outline-success shadow-sm"
                    onclick="$('#iframe').attr('src', '{{route('tasks_add')}}')">
                <i class="fas fa-plus-circle"></i>
                 Adicionar
            </button>
            <button type="button" class="btn btn-outline-primary shadow-sm"><i class="fas fa-filter"></i> Filtrar</button>
            <button type="button" class="btn btn-outline-warning shadow-sm"
                    onclick="$('#iframe').attr('src', '{{route('tasks_add')}}')">
                <i class="fas fa-eye"></i>
                Visualizar
            </button>
        </div>
        <hr class="border-secondary">
        <iframe id="iframe" class="border-0 w-100 m-0"
                src="{{route('tasks_add')}}" allowfullscreen onload="resizeIframe(this)"></iframe>
    </div>
@endsection
