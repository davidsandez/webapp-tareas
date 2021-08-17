<?php

namespace App\View\Components;

use Illuminate\View\Component;

class aside extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menu = $this->generate_menu();
        return view('components.dashboard.aside', 
                    compact("menu")   
                );
    }

    protected function generate_menu()
    {
        return array(
            'Dashboard' => array(
                'name' => 'Tareas',
                'link' => route('dashboard')
            ),
            'Users' => array(
                'name' => 'Usuarios',
                'link' => route('users')
            )        
        );
    }
}
