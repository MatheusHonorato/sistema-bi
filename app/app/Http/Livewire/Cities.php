<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\City;
use App\Models\State;
use Livewire\WithPagination;

class Cities extends Component
{
    use WithPagination;

    public $name, $states, $state_id, $city_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        return view('livewire.cities.index', ['cities' => City::paginate(20)]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->states = State::all();
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->city_id = 0;
        $this->state_id = 0;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'state_id' => 'required',
        ]);

        City::updateOrCreate(['id' => $this->city_id], [
            'name' => $this->name,
            'state_id' => $this->state_id
        ]);

        session()->flash('message',
            $this->city_id ? 'City Updated Successfully.' : 'City Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $this->city_id = $id;
        $this->name = $city->name;
        $this->state_id = $city->state_id;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        City::find($id)->delete();
        session()->flash('message', 'City Deleted Successfully.');
    }
}
