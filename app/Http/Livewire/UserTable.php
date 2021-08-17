<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.user-table', array('users' => $users));
    }
}
