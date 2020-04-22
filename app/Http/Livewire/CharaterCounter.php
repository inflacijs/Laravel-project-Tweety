<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CharaterCounter extends Component
{
    public $name = "Baiba";
    public function render()
    {
        return view('livewire.charater-counter');
    }
}
