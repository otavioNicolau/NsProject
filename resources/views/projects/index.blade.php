@extends('layouts.app')

@section('content')
@include('projects.create')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h1 text-dark">Meus Projetos</h1>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createProjectModal">
            <i class="bi bi-plus-circle me-1"></i> Novo Projeto
        </button>
    </div>

    <div class="row g-4">
        @foreach ($projects as $project)

        @include('projects.edit', ['project' => $project])

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                        <h5 class="card-title mb-2">
                            <a href="{{ route('projects.show', $project) }}" class="text-decoration-none text-dark ">
                                {{ $project->name }}
                            </a>
                        </h5>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-sm bg-transparent border-0 text-secondary" title="Editar Projeto" data-bs-toggle="modal" data-bs-target="#editProjectModal-{{ $project->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="m-0 p-0">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm bg-transparent border-0 text-danger" onclick="return confirm('Excluir projeto?')" title="Excluir Projeto">
                                    <i class="bi bi-trash-fill fs-5"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @include('tasks.index', ['project' => $project])

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection