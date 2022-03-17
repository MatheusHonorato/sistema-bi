<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Client;
use App\Models\State;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;

class Dashboard extends Component
{

    public $state_id = 0, $city_id = 0, $states, $cities, $age, $amount, $from, $to, $male, $female, $not_info;
    public $filter_30_39, $filter_40_49, $filter_50_59, $filter_60_69, $filter_mais_70;

    protected $listeners = [
        'Dashboard',
        'onColumnClick' => 'handleOnColumnClick',
        'onSliceClick' => 'handleOnSliceClick',
    ];

    public function handleOnColumnClick($point)
    {
        switch ($point['title']) {
            case '30 a 39 anos':
                $this->from = date('1983-01-01');
                $this->to = date('1992-12-30');
                break;
            case '40 a 49 anos':
                $this->from = date('1973-01-01');
                $this->to = date('1982-12-30');
                break;
            case '50 a 59 anos':
                $this->from = date('1963-01-01');
                $this->to = date('1972-12-30');
                break;
            case '60 a 69 anos':
                $this->from = date('1953-01-01');
                $this->to = date('1942-12-30');
                break;
            case 'Mais de 70 anos':
                $this->from = date('1943-01-01');
                $this->to = date('1900-12-30');
                break;
        }
        $this->male = Client::where('city_id', $this->city_id)->where('flag_type', 'M')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
        $this->female = Client::where('city_id', $this->city_id)->where('flag_type', 'F')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
        $this->not_info = Client::where('city_id', $this->city_id)->where('flag_type', '')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function mount()
    {
        $this->states = State::all();
        $this->amount = Client::count();

        $this->male = Client::where('city_id', $this->city_id)->where('flag_type', 'M')->count();
        $this->female = Client::where('city_id', $this->city_id)->where('flag_type', 'F')->count();
        $this->not_info = Client::where('city_id', $this->city_id)->where('flag_type', '')->count();

    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->cities = City::where('state_id', $this->state_id)->get();

        $this->from = date('1983-01-01');
        $this->to = date('1992-12-30');

        $this->filter_30_39 = Client::where('city_id', $this->city_id)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

        $this->from = date('1973-01-01');
        $this->to = date('1982-12-30');

        $this->filter_40_49 = Client::where('city_id', $this->city_id)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

        $this->from = date('1963-01-01');
        $this->to = date('1972-12-30');

        $this->filter_50_59 = Client::where('city_id', $this->city_id)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

        $this->from = date('1953-01-01');
        $this->to = date('1962-12-30');

        $this->filter_60_69 = Client::where('city_id', $this->city_id)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

        $this->from = date('1943-01-01');
        $this->to = date('1900-12-30');

        $this->filter_mais_70 = Client::where('city_id', $this->city_id)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

        $columnChartModel =
        (new ColumnChartModel())
            ->setTitle('Faixa Etaria')
            ->addColumn('30 a 39 anos', $this->filter_30_39, '#35A0FF')
            ->addColumn('40 a 49 anos', $this->filter_40_49, '#35A0FF')
            ->addColumn('50 a 59 anos', $this->filter_50_59, '#35A0FF')
            ->addColumn('60 a 69 anos', $this->filter_60_69, '#35A0FF')
            ->addColumn('Mais de 70 anos', $this->filter_mais_70, '#35A0FF')
            ->withOnColumnClickEventName('onColumnClick');

        $pieChartModel =
        (new PieChartModel())
            ->setTitle('Sexo')
            ->addSlice('Masculino', $this->male, '#1B5585')
            ->addSlice('Feminino', $this->female, '#C794C0')
            ->addSlice('Não Informado', $this->filter_50_59, '#596023')
            ->withOnSliceClickEvent('onSliceClick');

        return view('livewire.dashboard')->with([
            'columnChartModel' => $columnChartModel,
            'pieChartModel' => $pieChartModel
        ]);
    }

}
