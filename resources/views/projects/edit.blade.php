<div class="modal fade" id="editProjectModal-{{ $project->id }}" tabindex="-1" aria-labelledby="editProjectModalLabel-{{ $project->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('projects.update', $project) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjectModalLabel-{{ $project->id }}">Editar Projeto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome do Projeto</label>
                        <input type="text" name="name" value="{{ $project->name }}" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Atualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
