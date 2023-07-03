@extends('layouts.app')

@section('title', 'Tarefas')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('alert-success') }}
                    </div>
                    @endif

                    @if (Session::has('alert-info'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('alert-info') }}
                    </div>
                    @endif

                    @if (count($tarefas) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $tarefa)
                            <tr>
                                <td>{{ $tarefa->titulo }}</td>
                                <td>{{ $tarefa->descricao }}</td>
                                <td>
                                    @if ($tarefa->terminada == 1)
                                    <a class="btn btn-sm btn-success" href="">Terminada</a>
                                    @else
                                    <a class="btn btn-sm btn-danger" href="">Incompleta</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('tarefas.editar', $tarefa->id) }}">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @else
                    <h4>Nenhuma tarefa foi criada ainda</h4>
                    @endif
                    <a class="btn btn-sm btn-info" href="{{ route('tarefas.criar') }}">Criar nova tarefa</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection