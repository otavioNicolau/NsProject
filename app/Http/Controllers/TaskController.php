<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:5', 
            'status' => 'required|in:pendente,concluída',
            'due_date' => 'nullable|date|after_or_equal:today',
        ], [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser uma string válida.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'title.min' => 'O título deve ter pelo menos 5 caracteres.',

            'status.required' => 'O status é obrigatório.',
            'status.in' => 'O status deve ser "pendente" ou "concluída".',

            'due_date.date' => 'A data de vencimento deve ser uma data válida.',
            'due_date.after_or_equal' => 'A data de vencimento deve ser hoje ou uma data futura.', 
        ]);
        $project->tasks()->create($request->only('title', 'status', 'due_date'));

        return redirect()->route('projects.show', $project)->with('success', 'Tarefa adicionada.');
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:5', 
            'status' => 'required|in:pendente,concluída',
            'due_date' => 'nullable|date|after_or_equal:today',
        ], [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser uma string válida.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'title.min' => 'O título deve ter pelo menos 5 caracteres.',

            'status.required' => 'O status é obrigatório.',
            'status.in' => 'O status deve ser "pendente" ou "concluída".',

            'due_date.date' => 'A data de vencimento deve ser uma data válida.',
            'due_date.after_or_equal' => 'A data de vencimento deve ser hoje ou uma data futura.', 
        ]);


        $task->update($request->only('title', 'status', 'due_date'));

        return redirect()->route('projects.show', $project)->with('success', 'Tarefa atualizada.');
    }


    public function updateWithAjax(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'status' => 'required|in:pendente,concluída',
        ]);

        $task->status = $request->input('status');

        if ($request->has('title')) {
            $task->title = $request->input('title');
        }

        if ($request->has('due_date')) {
            $task->due_date = $request->input('due_date');
        }

        $task->save();

        return response()->json(['message' => 'Status atualizado com sucesso!', 'task' => $task], 200);
    }


    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('projects.show', $project)->with('success', 'Tarefa excluída.');
    }
}
