<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="bg-white overflow-hidden">
                    <div class="py-2 bg-white border-b border-gray-200 columns-1 sm:columns-8 px-5 md:px-10">

                        <div class="w-full text-center sm:text-left">
                            Simulação
                        </div>
                        <div class="w-full text-center sm:text-left mr-2 font-medium">
                            Total: {{ $amount }}
                        </div>
                        <div class="w-full text-2xl mt-3 text-center">
                            <button id="dropdownDefault" onclick="check()" data-dropdown-toggle="dropdown" class="w-full text-white bg-gray-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-blue-800" type="button"><i class="fa-solid fa-filter mr-2"></i> Estado(s)<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                            <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                @foreach($states_teste as $state)
                                    <li class="flex flex-row justify-between px-1">
                                        @if(isset($state))
                                        <label>{{ $state->name }}</label>
                                        <input id="state" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  wire:model="states.{{ $state->id }}" value="{{ $state->id }}" checked>
                                        @endif
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="w-full text-2xl text-center mt-3 md:mt-0">
                            <button id="dropdownCity" data-dropdown-toggle="city" class="w-full text-white bg-gray-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-blue-800" type="button"><i class="fa-solid fa-filter mr-2"></i> Cidades<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                            <div id="city" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                @foreach($cities_options as $city)
                                    <li class="flex flex-row justify-between px-1">
                                        @if(isset($city))
                                        <label>{{ $city->name }}</label>
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  wire:model="cities.{{ $city->id }}" value="{{ $city->id }}">
                                        @endif
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="w-full text-2xl text-center mt-3 md:mt-0">
                            <button id="dropdownBairros" data-dropdown-toggle="bairros" class="w-full text-white bg-gray-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-blue-800" type="button"><i class="fa-solid fa-filter mr-2"></i> Bairros<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                            <div id="bairros" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                @foreach($bairros_options as $bairro)
                                <li class="flex flex-row justify-between px-1">
                                    @if(isset($bairro))
                                    <label>{{ $bairro }}</label>
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  wire:model="bairros.{{ $bairro }}" value="{{ $bairro }}">
                                    @endif
                                </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="w-full text-2xl text-center mt-3 md:mt-0">
                            <button id="dropdownGenders" data-dropdown-toggle="genders" class="w-full text-white bg-gray-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-blue-800" type="button"><i class="fa-solid fa-filter mr-2"></i>Sexo<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                            <div id="genders" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                @foreach($genders_options as $gender => $name)
                                <li class="flex flex-row justify-between px-1">
                                    @if(isset($gender))
                                    <label>{{ $name }}</label>
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  wire:model="genders.{{ $gender }}" value="{{ $gender }}">
                                    @endif
                                </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="w-full text-2xl text-center mt-3 md:mt-0">
                            <button id="dropdownYearsOld" data-dropdown-toggle="years_olds" class="w-full text-white bg-gray-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-blue-800" type="button"><i class="fa-solid fa-filter mr-2"></i> Idade<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                            <div id="years_olds" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                @foreach($years_olds_options as $key => $value)
                                <li class="flex flex-row justify-between px-1">
                                    @if(isset($value))
                                    <label>{{ $key }}</label>
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  wire:model="years_olds.{{ $key }}" value="{{ $key }}">
                                    @endif
                                </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="w-full text-2xl text-center mt-3 mb-3 md:mt-0 md:mb-0">
                            <button id="dropdownExport" data-dropdown-toggle="export" class="w-full text-white bg-gray-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-blue-800" type="button"><i class="fa-solid fa-download mr-2"></i> Exportar<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                            <div id="export" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    <li class="flex flex-row justify-between px-1 cursor-pointer hover:bg-gray-900 hover:text-white" wire:click="downloadPhone">Telefone</li>
                                    <li class="flex flex-row justify-between px-1 cursor-pointer hover:bg-gray-900 hover:text-white" wire:click="downloadSMS">SMS</li>
                                    <li class="flex flex-row justify-between px-1 cursor-pointer hover:bg-gray-900 hover:text-white" wire:click="downloadMalaDireta">Mala direta</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 {!! $viewChart !!} flex items-center justify-center">

                            <div class="{{ count($states) == 0 ? 'hidden' : '' }}">
                                <div style="height: 15rem;">
                                    <livewire:livewire-column-chart
                                        key="{{ $columnChartModel->reactiveKey() }}"
                                        :column-chart-model="$columnChartModel"
                                    />
                                </div>
                                <div style="height: 15rem;">
                                    <livewire:livewire-pie-chart
                                        key="{{ $pieChartModel->reactiveKey() }}"
                                        :pie-chart-model="$pieChartModel"
                                    />
                                </div>
                            </div>

                            <div>
                                <livewire:map/>
                                @if(count($cities) > 0)
                                    <p class="text-right pr-1 pt-2">Para limpar as coordenadas do mapa clique <a href="" class="font-bold">aqui.</a></p>
                                @endif
                            </div>

                    </div>
                </div>

                <div class="min-h-screen py-5 {!! $viewTable !!}">
                    <div class="bg-white overflow-x-auto w-full px-4 py-4">
                        @if (session()->has('message'))
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                            <div class="flex">
                                <div>
                                <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                            </div>
                        @endif

                        <table class="table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">Id.</th>
                                    <th class="px-4 py-2" sortable direction="asc">Nome</th>
                                    <th class="px-4 py-2">Telefone</th>
                                    <th class="px-4 py-2">Rua</th>
                                    <th class="px-4 py-2">Número</th>
                                    <th class="px-4 py-2">Bairro</th>
                                    <th class="px-4 py-2">Cidade</th>
                                    <th class="px-4 py-2 w-20">UF</th>
                                    <th class="px-4 py-2">CEP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr class="border">
                                    <td class="border px-4 py-2">{{ $client->id }}</td>
                                    <td class="border px-4 py-2">{{ $client->name }}</td>
                                    <td class="px-4 py-2 flex justify-center">

                                    <button id="dropdownPhones{{ $client->id }}" data-dropdown-toggle="phones{{ $client->id }}" class="w-full text-white bg-blue-500 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-blue-800" type="button"><i class="fa-solid fa-eye"></i><svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                                    <div id="phones{{ $client->id }}" class="hidden z-10 w-100 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                        @foreach($client->phones as $phone)
                                        <li class="flex flex-row justify-between px-1">
                                            <label>
                                            @switch($phone->phone_type)
                                                @case(1)
                                                    TELEFONE RESIDENCIAL
                                                    @break
                                                @case(2)
                                                    TELEFONE COMERCIAL
                                                    @break
                                                @case(3)
                                                    TELEFONE MÓVEL
                                                    @break
                                                @case(4)
                                                    TELEFONE MÓVEL
                                                    @break
                                                @case(5)
                                                    TELEFONE PÚBLICO
                                                    @break
                                                @case(6)
                                                    HOUSE HOLD-FAMILIA
                                                    @break
                                                @case(7)
                                                    HOUSE HOLD-ENDEREÇO
                                                    @break
                                                @case(8)
                                                    TELEFONE MÓVEL COML
                                                    @break
                                                @case(9)
                                                    TELEFONE PARENTES
                                                    @break
                                            @endswitch
                                            | ({{ $phone->ddd }}) {{ substr($phone->phone, 0, 5) }} - {{ substr($phone->phone, 5, 9) }}</label>
                                        </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    </td>
                                    <td class="border px-4 py-2">{{ $client->street }}</td>
                                    <td class="border px-4 py-2">{{ $client->number }}</td>
                                    <td class="border px-4 py-2">{{ $client->bairro }}</td>
                                    <td class="border px-4 py-2">{{ $client->city->name }}</td>
                                    <td class="border px-4 py-2">{{ $client->city->state->name }}</td>
                                    <td class="border px-4 py-2">{{ substr($client->cep, 0, 5) }} - {{ substr($client->cep, 5, 8) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $clients->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="text-center">
        <p class="text-red-600">A Rebrax Assessoria realiza suas atividades de tabulação de dados em conformidade com a LGPD - Lei Geral de Proteção de Dados.<br>Todos os dados aqui apresentados são meramente ilustrativos.</p>
    </div>
</div>
