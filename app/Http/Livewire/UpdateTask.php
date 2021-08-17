<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateTask extends Component
{

    public $task;

    public function render()
    {
        return view('livewire.update-task');
    }

    public function edit($id)
    {
        $this->emit("edit", $id);
    }
}
