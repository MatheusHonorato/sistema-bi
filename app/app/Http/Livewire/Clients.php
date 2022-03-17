<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;

    public $search = '';
    public $isOpen = 0;

    protected $listeners = ['closeModal'];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        return view('livewire.clients.index', [
            'clients' => Client::where('name', 'like', '%'.$this->search.'%')->paginate(50),
        ]);
    }
}
