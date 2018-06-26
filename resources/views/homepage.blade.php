@extends('header')

<div class="container col-sm-6 offset-sm-4 col-md-4 offset-md-4">
    <div class="todo-title">Todo App</div>
    <div class="add-task"><input type="text" placeholder="New task to add"><button>Add</button></div>
    <div class="table-tasks">
        <table>
            @if(count($tasks))
                @foreach($tasks as $task)
                <tr class="row-task row-task-{{ $task->id }}">
                    <td class="checkbox-field"><input type="checkbox" @if($task->checked) checked @endif data-task="{{ $task->id }}"></td>
                    <td class="description description-task-{{ $task->id }} @if($task->checked) is-checked @endif" data-task="{{ $task->id }}" >{{ $task->description }}</td>
                    <td><button class="remove-button remove-task" data-task="{{ $task->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                </tr>
                @endforeach
            @else
                <div class="no-tasks">Currently you dont have any tasks.</div>
            @endif
        </table>
    </div>
</div>

@extends('footer')