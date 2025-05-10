<div class="modal fade" id="editTaskModal-{{ $task->id }}" tabindex="-1" aria-labelledby="editTaskModalLabel-{{ $task->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('projects.tasks.update', [$project, $task]) }}" method="POST">
                @csrf @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editTaskModalLabel-{{ $task->id }}">Editar Tarefa: {{ $task->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pendente" {{ $task->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="concluída" {{ $task->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prazo</label>
                        <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>



