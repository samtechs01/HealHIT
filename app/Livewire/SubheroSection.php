<?php

namespace App\Livewire;

use Livewire\Component;

class SubheroSection extends Component
{
    public $title;

    public function mount($title = 'Default Title')
    {
        $this->title = $title;
    }
    public function render()
    {
        return view('livewire.subhero-section');
    }
}
