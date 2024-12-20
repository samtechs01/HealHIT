<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectCard extends Component
{
    /**
     * 
     * *Sending to market can be 
     * DRAFT /SENT/ /APPROVED/ WITHDRAWN / CANCELLED
     * 
     * 
     */

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
     }

   
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.project-card');
    }
}
