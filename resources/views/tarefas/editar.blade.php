@extends('layouts.app')

@section('title', 'Tarefas')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarefas</div>

                <div class="card-body">
                    <h4>Editar</h4>
                    <form method="post" action="{{ route('tarefas.atualizar') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $tarefa->id }}">
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" value="{{ $tarefa->titulo }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea name="descricao" value="{{ $tarefa->descricao }}" class="form-control" cols="5" rows="5">{{ $tarefa->descricao }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Estado</label>
                            <select name="terminada" class="form-control">
                                <option disabled selected>Selecione uma opção</option>
                                <option value="1" 
                                @if ($tarefa->terminada == 1)
                                    selected
                                @endif>Terminada</option>
                                <option value="0" 
                                @if ($tarefa->terminada == 0)
                                    selected
                                @endif>Incompleta</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection