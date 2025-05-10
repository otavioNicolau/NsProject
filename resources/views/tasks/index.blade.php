@if ($project->tasks->count())
    <ul class="list-group list-group-flush">
        @foreach ($project->tasks as $task)
            <li class="list-group-item px-0 py-1 d-flex justify-content-start align-items-center bg-transparent border-0">
                <div class="form-check mb-0 me-2">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        {{ $task->status == 'concluída' ? 'checked' : '' }}
                        data-task-id="{{ $task->id }}"
                        data-project-id="{{ $project->id }}">
                </div>
                <p class="mb-2 {{ $task->status == 'concluída' ? 'text-primary' : '' }}">
                    {{ $task->title }}
                    @if ($task->due_date)
                        <span class="text-muted">({{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }})</span>
                    @endif
                </p>
            </li>
        @endforeach
    </ul>
@else
    <p class="text-muted mb-0">Sem tarefas cadastradas.</p>
@endif

<script>
$(document).ready(function() {
    $(document).on('change', '.form-check-input', function() {
        updateTaskStatus(this);
    });
});

function updateTaskStatus(checkbox) {
    var taskId = $(checkbox).data('task-id');
    var projectId = $(checkbox).data('project-id');
    var status = $(checkbox).prop('checked') ? 'concluída' : 'pendente';

    const $text = $(checkbox).closest('li').find('p');
    $text.addClass('text-primary');

    $.ajax({
        url: '/projects/' + projectId + '/tasks/' + taskId + '/ajax-update',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            _method: 'PUT',
            status: status
        },
        success: function(response) {
            if (status === 'concluída') {
                $text.addClass('text-primary');
            } else {
                $text.removeClass('text-primary');
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro ao atualizar o status:', error);
            $(checkbox).prop('checked', !$(checkbox).prop('checked'));
        }
    });
}
</script>


