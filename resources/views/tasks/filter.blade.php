@php    $hideNav=true @endphp
@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="col-12 text-center">
            <h3>Filtrar Tarefas</h3>
        </div>
        <hr class="border-secondary">
        <form class="m-2" method="post">
            @include('layouts.alerts')

            @csrf
            <div class="form-row text-center">
                <div class="form-group col-3">
                    <label for="inputStatus">Status:</label>
                    <select id="inputStatus" class="form-control bg-dark border-secondary text-light"
                            name="status">
                        @foreach ($status as $stat)
                            <option value="{{$stat->id}}">{{ucfirst($stat->name)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-3">
                    <label for="inputUser">Usuário:</label>
                    <select id="inputUser" class="form-control bg-dark border-secondary text-light" name="user">
                        <option value="0">Todos usuários</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="inputEnterprise">Empresa:</label>
                    <select id="inputEnterprise" class="form-control bg-dark border-secondary text-light"
                            name="enterprise">
                        <option value="0">Todas empresas</option>
                        @foreach ($enterprises as $enterprise)
                            <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-3">
                    <label for="inputGroup">Grupo:</label>
                    <select id="inputGroup" class="form-control bg-dark border-secondary text-light"
                            name="group">
                        <option value="0">Todos grupos</option>
                        @foreach ($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-3">
                    <label for="inputOrder">Ordenar por:</label>
                    <select id="inputOrder" class="form-control bg-dark border-secondary text-light"
                            name="order">
                        <option value="0">Padrão (Usuário -> Empresa -> Nome -> Prazo)</option>
                        @foreach ($orders as $order)
                            <option value="{{$order->id}}">{{$order->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-3">
                    <label for="inputKeyWord">Palavra chave:</label>
                    <input id="inputKeyWord" type="text" class="form-control bg-dark border-secondary text-light"
                           name="keyWord"/>
                </div>
            </div>

            <hr class="border-secondary">

            <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Filtrar</button>
            </div>
        </form>
    </div>

@endsection
