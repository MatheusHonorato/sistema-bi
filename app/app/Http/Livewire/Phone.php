<?php

namespace App\Http\Livewire;

use App\Models\Phone as ModelsPhone;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Phone extends Component
{
    public $phones;

    public function mount($id)
    {
        $this->phones = ModelsPhone::where('client_id', $id)->get();
    }

    public function closeModal()
    {
        return redirect()->route('clients');
    }

    public function render()
    {
        return view('livewire.clients.phone');
    }
}
