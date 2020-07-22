@php    $hideNav=true @endphp
@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="col-12 text-center">
            <h3>Adicionar Tarefas</h3>
        </div>
        <hr class="border-secondary">
        <form class="m-2" method="post">
            @include('layouts.alerts')

            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputName">Nome</label>
                    <input type="text" class="form-control bg-dark border-secondary text-light" id="inputName"
                           name="name" placeholder="Nome">
                </div>
                <div class="form-group col-2">
                    <label for="inputUser">Usuário</label>
                    <select id="inputUser" class="form-control bg-dark border-secondary text-light" name="user">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}"
                                    @if ($user->id == Auth::id())
                                    selected
                                @endif
                            >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="inputEnterprise">Empresa</label>
                    <select id="inputEnterprise" class="form-control bg-dark border-secondary text-light"
                            name="enterprise">
                        @foreach ($enterprises as $enterprise)
                            <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-2">
                    <label for="inputPriority">Prioridade</label>
                    <select id="inputPriority" class="form-control bg-dark border-secondary text-light" name="priority">
                        @foreach ($priorities as $priority)
                            <option value="{{$priority->id}}">{{ucfirst($priority->name)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="inputReference">Referência (AAAAMM Ex: 202001) </label>
                    <input type="number" class="form-control bg-dark border-secondary text-light" id="inputReference"
                           name="reference" max="300000">
                </div>
                <div class="form-group col-3">
                    <label for="inputDeadline">Prazo</label>
                    <input type="date" class="form-control bg-dark border-secondary text-light" id="inputDeadline"
                           name="deadline"></input>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputDescription">Descrição</label>
                    <textarea class="form-control bg-dark border-secondary text-light" id="inputDescription"
                              name="description" rows="5"></textarea>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center">
                <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Criar</button>
            </div>
        </form>
    </div>

@endsection
