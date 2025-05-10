<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('projects.tasks.store', $project) }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="createTaskModalLabel">Nova Tarefa para: {{ $project->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pendente">Pendente</option>
                            <option value="concluída">Concluída</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prazo</label>
                        <input type="date" name="due_date" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
