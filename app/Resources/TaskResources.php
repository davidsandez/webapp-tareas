<?php

namespace App\Resources;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskResources
{

    public function index()
    {
       $tasks = Task::paginate(5);
       $tasksResources = [];
       foreach($tasks as $task)
       {
            $tasksResources[$task->id] = $this->get_task($task);
       }
       return [$tasksResources, $tasks];
    }

    public function get($id)
    {
        $task = Task::find($id);
        $taskResource = $this->get_task($task);
        return $taskResource;
    }

    protected function get_task(Task $task)
    {
        return [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'team' => $this->get_team($task),
            'status' => $task->status,
            'delivery_date' => $task->delivery_date
        ];
    }

    protected function get_team(Task $task)
    {
        $users = [];
        foreach( $task->users as $user )
        {
            array_push($users, array(
                'name' => $user->name,
                'email' => $user->email,
            ));
        }
        return $users;
    }
}
