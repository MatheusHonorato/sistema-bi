<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;

    public $search = '';
    public $cities_id;

    protected $listeners = ['refreshClients' => 'refreshClients'];

    public function refreshClients($cities_id) {
        $this->cities_id = $cities_id;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        return view('livewire.clients.index', [
            'clients' => Client::where('name', 'like', '%'.$this->search.'%')->where('city_id', $this->cities_id)->paginate(150),
        ]);
    }
}
