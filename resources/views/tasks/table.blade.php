<div class="table-responsive">
    <table class="table" id="tasks-table">
        <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                
                <td width="120">
                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tasks.show', [$task->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tasks.edit', [$task->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
