$(document).ready(function() {
    $(document).on('change', '.form-check-input', function() {
        updateTaskStatus(this);
    });
});

function updateTaskStatus(checkbox) {
    var taskId = $(checkbox).data('task-id');
    var projectId = $(checkbox).data('project-id');
    var status = $(checkbox).prop('checked') ? 'concluída' : 'pendente';

    $.ajax({
        url: '/projects/' + projectId + '/tasks/' + taskId + '/ajax-update',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            _method: 'PUT',
            status: status
        },
        success: function(response) {
            const $text = $(checkbox).closest('li').find('p');
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
