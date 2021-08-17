<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use App\Resources\TaskResources;

class TaskEditor extends Component
{

    public $open = false;
    
    public $users_team = [];

    public $new_member;

    public $delivery_date;

    public $title;

    public $description;

    public $status;

    public $users = "";

    public $task = "";

    protected $listeners = [
        "create", "edit"
    ];

/*     public function hydrateOpen()
    {
        if(!$this->open)
        {
            $this->reset_properties();
        }
        
    } */

    public function render()
    {
        $task = $this->task;
        $users = $this->users;
        return view('livewire.task-editor', 
                    array('task' => $task,
                          'users' => $users,
                          'title' => $this->title,
                          'description' => $this->description,
                          'status' => $this->status,
                          'delivery_date' => $this->delivery_date,
                          'team' => $this->users_team )
                );    
    }

    public function create()
    {
        $this->reset_properties();
        $this->users = User::all(); 
        $this->open = true;
    }

    public function edit($id)
    {   
        $this->reset_properties();
        $this->users = User::all(); 
        $this->task = Task::find($id);
        $this->title = $this->task->title;
        $this->description = $this->task->description;
        $this->status = $this->task->status;
        $this->delivery_date = $this->task->delivery_date; 
        foreach($this->task->users as $user)
        {
            $this->users_team[$user->id] = User::find($user->id);
        }
        $this->open = true;
    }

    public function deleteUserTeam($id)
    {   
        $user = User::find($id);
        unset($this->users_team[$user->id]);
    }

    public function addMember()
    {
        $user = $this->users->find($this->new_member);
        //dd($user);
        if( !array_key_exists($user->id, $this->users_team) )
        {
            $this->users_team[$user->id] = $user;
        };
        $this->new_member="";        
    }


    public function close()
    {
        $this->reset_properties();
        $this->open = false;
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        $this->emit('render');
        $this->open = false;
    }

    public function saveChanges($id)
    {
        $task = Task::find($id);
        $task->update([
           'title' => $this->title,
           'description' => $this->description,
           'status' => $this->status,
           'delivery_date' => $this->delivery_date,
        ]);
        $list_users = array_map(function($item){
            return $item['id'];
        }, $this->users_team);
       $task->users()->sync($list_users);
       $this->emit('render');
       $this->open = false;
    }

    protected function reset_properties()
    {
        $this->task = "";
        $this->users = "";
        $this->users_team = [];
        $this->title = "";
        $this->description = "";
        $this->delivery_date = "";
        $this->status = "";
        $this->new_member = "";
    }

    protected function verified_properties()
    {
        $result_verified = false;

        if(
            isset($this->task) && $this->task != "" &&
            isset($this->users) && $this->users != "" &&
            isset($this->users_team) && $this->users_team != [] &&
            isset($this->title) && $this->title != "" &&
            isset($this->description) && $this->description != "" &&
            isset($this->delivery_date) && $this->delivery_date != "" &&
            isset($this->status) && $this->status != "" &&
            isset($this->new_member) && $this->new_member != ""       
        )
        {
            $result_verified = true;
        }
        return $result_verified;
    }
}
