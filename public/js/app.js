$(document).on('click', '.checkbox-field input', function() {
    var taskId = $(this).data('task');
    if($(this).is(':checked')){
        var checked = 1;
        $('.description-task-'+taskId).addClass('is-checked');
    } else {
        var checked = 0;
        $('.description-task-'+taskId).removeClass('is-checked');
    }

    updateTask(taskId, checked);
});

$(document).on('click', '.remove-task', function() {
    var taskId = $(this).data('task');

    removeTask(taskId);
});

$(".add-task input").on('keyup', function (e) {
    if (e.keyCode == 13) {
        var description = $('.add-task input').val();
        if(description){
            addTask(description);
        } else {
          alert('Please add a description to your task.');
        }
    }
});

$(document).on('click', '.add-task button', function() {
    var description = $('.add-task input').val();

    if(description){
        addTask(description);
    } else {
      alert('Please add a description to your task.');
    }
})

// AJAX CALLS
function addTask(description) {
  $.ajax({
    url: "/tasks/addTask",
    data: {'description': description},
    success: function(lastInsertedId){
        $('.no-tasks').remove();
        $('.table-tasks').fadeIn();
        $('.table-tasks table').prepend('<tr class="row-task row-task-' + lastInsertedId + ' ">' +
            '<td class="checkbox-field"><input type="checkbox" data-task="' + lastInsertedId + '"></td>' +
            '<td class="description description-task-' + lastInsertedId + '" data-task="' + lastInsertedId + '" >' + description + '</td>' +
            '<td><button class="remove-button remove-task" data-task="' + lastInsertedId + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td>'+
        '</tr>');
        $('.row-task-' + lastInsertedId).hide().fadeIn('slow');
    }
  });
}

function removeTask(taskId){
  $.ajax({
    url: "/tasks/removeTask",
    data: {'id': taskId},
    success: function(result){
        $('.row-task-'+taskId).fadeOut('slow').remove();
        if($('.row-task').length == 0){
          $('.table-tasks').fadeOut();
        }
    }
  });
}

function updateTask(taskId, checked){
  $.ajax({
    url: "/tasks/updateStatusTask",
    data: {'id': taskId, 'checked': checked}
  });
}