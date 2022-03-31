<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;

use Livewire\WithPagination;

class Example extends Component
{
    use WithPagination;

    public $name, $state_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        return view('livewire.states.index', ['states' => State::paginate(20)]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
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
        $this->state_id = '';
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
        ]);

        State::updateOrCreate(['id' => $this->state_id], [
            'name' => $this->name
        ]);

        session()->flash('message',
            $this->state_id ? 'State Updated Successfully.' : 'State Created Successfully.');

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
        $state = State::findOrFail($id);
        $this->state_id = $id;
        $this->name = $state->name;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        State::find($id)->delete();
        session()->flash('message', 'State Deleted Successfully.');
    }
}
