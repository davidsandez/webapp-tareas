<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateTask extends Component
{
    public function render()
    {
        return view('livewire.create-task');
    }

    public function create()
    {
        $this->emit("create");
    }
}
