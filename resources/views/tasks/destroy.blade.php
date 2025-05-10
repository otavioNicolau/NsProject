<div class="modal fade" id="deleteTaskModal-{{ $task->id }}" tabindex="-1" aria-labelledby="deleteTaskModalLabel-{{ $task->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTaskModalLabel-{{ $task->id }}">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir a tarefa <strong>{{ $task->title }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
