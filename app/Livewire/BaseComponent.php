<?php

namespace App\Livewire;

use Livewire\Component;

class BaseComponent extends Component
{
    protected  $listeners = ['livewire-ready'];

    public function mounted()
    {
        $this->dispatchBrowserEvent('livewire-ready');
    }

    public function render()
    {
        return view('livewire.base-component');
    }
}
