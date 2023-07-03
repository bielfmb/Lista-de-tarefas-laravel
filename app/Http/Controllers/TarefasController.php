<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function index() {
        $tarefas = Tarefa::all();
        return view('tarefas.index', [
            'tarefas' => $tarefas
        ]);
    }

    public function criar() {
        return view('tarefas.criar');
    }

    public function armazenar(TarefaRequest $request) {
        Tarefa::create([
            'titulo' => $request-> titulo,
            'descricao' => $request-> descricao,
            'terminada' => 0
        ]);

        $request->session()->flash('alert-success', 'Tarefa criada com sucesso');

        return to_route('tarefas.index');
    }

    public function editar($id) {
        $tarefa = Tarefa::find($id);
        
        return view('tarefas.editar', ['tarefa' => $tarefa]);
    }

    public function atualizar(TarefaRequest $request) {
        Tarefa::find($request->id)->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'terminada' => $request->terminada
        ]);

        $request->session()->flash('alert-info', 'Tarefa atualizada com sucesso');
        return to_route('tarefas.index');
    }
}
