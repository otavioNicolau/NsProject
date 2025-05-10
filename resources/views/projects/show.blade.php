@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h1 class="mb-3">{{ $project->name }}</h1>

    @include('tasks.create', ['project' => $project])

    <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h4 text-dark">Tarefas do Projeto</h1>

    <div class="d-flex gap-2">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTaskModal">
            <i class="bi bi-plus-circle me-1"></i> Nova Tarefa
        </button>
        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>
</div>
</div>



<table id="tasksTable" class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>Título</th>
            <th>Status</th>
            <th>Prazo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($project->tasks as $task)

        @include('tasks.edit', ['task' => $task, 'project' => $project])
        @include('tasks.destroy', ['project' => $project, 'task' => $task])

        <tr>
            <td>{{ $task->title }}</td>
            <td>
                <span class="badge bg-{{ $task->status == 'concluída' ? 'success' : 'secondary' }}">
                    {{ ucfirst($task->status) }}
                </span>
            </td>
            <td>
                @if ($task->due_date)
                {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                @else
                —
                @endif
            </td>
            <td class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn-primary" title="Editar Tarefa" data-bs-toggle="modal" data-bs-target="#editTaskModal-{{ $task->id }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTaskModal-{{ $task->id }}" title="Excluir Tarefa">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<script>
    $(document).ready(function() {
        $('#tasksTable').DataTable({
            pageLength: 50,
            language: {
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ tarefas",
                paginate: {
                    next: " Próximo ",
                    previous: "Anterior "
                },
                zeroRecords: "Nenhuma tarefa encontrada",
            }
        });
    });
</script>

@endsection