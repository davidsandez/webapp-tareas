<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Resources\TaskResources;

class TaskTable extends Component
{

    protected $listeners = ["render"];

    public function render()
    {
        /*$resource = new TaskResources();
        $resource = $resource->index();
        $this->tasks = $resource[0];
        $this->pagination = $resource[1]; */
        $tasks = Task::paginate(5);
        return view('livewire.task-table', 
                    array(
                        'tasks' => $tasks,
                    )
                );
    }

    public function change()
    {
        $this->reset(['tasks', 'pagination']);
        $this->render();
    }

}
