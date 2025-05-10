<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:5|max:255',
        ], [
            'name.required' => 'O nome do projeto é obrigatório.',
            'name.string' => 'O nome do projeto deve ser uma string válida.',
            'name.min' => 'O nome do projeto deve ter pelo menos 5 caracteres.',
            'name.max' => 'O nome do projeto não pode ter mais de 255 caracteres.',
        ]);

        Project::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('projects.index')->with('success', 'Projeto criado com sucesso.');
    }

    public function show(Project $project)
    {
        $this->authorizeAccess($project);

        $project->load(['tasks' => function ($query) {
            $query->orderBy('due_date', 'desc');
        }]);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorizeAccess($project);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $this->authorizeAccess($project);

        $request->validate([
            'name' => 'required|string|min:5|max:255',
        ], [
            'name.required' => 'O nome do projeto é obrigatório.',
            'name.string' => 'O nome do projeto deve ser uma string válida.',
            'name.min' => 'O nome do projeto deve ter pelo menos 5 caracteres.',
            'name.max' => 'O nome do projeto não pode ter mais de 255 caracteres.',
        ]);


        $project->update($request->only('name'));

        return redirect()->route('projects.index')->with('success', 'Projeto atualizado com sucesso.');
    }

    public function destroy(Project $project)
    {
        $this->authorizeAccess($project);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projeto excluído com sucesso.');
    }

    private function authorizeAccess(Project $project)
    {
        if ($project->user_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado');
        }
    }
}
