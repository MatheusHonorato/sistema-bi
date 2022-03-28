<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $longs, $lats, $points = [];


    public function render()
    {
        return view('livewire.map');
    }

}
