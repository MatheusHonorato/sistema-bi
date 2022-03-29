<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="sm:px-20 py-2 bg-white border-b border-gray-200">
                        <div class="flex justify-content justify-between items-center">
                            <div>
                                Dashboard dados cadastrais
                            </div>
                            <div>
                                Total: {{ $amount }}
                            </div>
                            <div class="text-2xl">
                                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Estados<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                                <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    @foreach($states_teste as $state)
                                        <li class="flex flex-row justify-between px-1">
                                            @if(isset($state))
                                            <label>{{ $state->name }}</label>
                                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  wire:model="states.{{ $state->id }}" value="{{ $state->id }}">
                                            @endif
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="text-2xl">
                                <button id="dropdownCity" data-dropdown-toggle="city" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Cidades<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                                <div id="city" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                        <li class="flex flex-row justify-between px-1">
                                            @if(isset($cities_options))
                                            <label>Selecionar todas</label>
                                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  wire:model="cities_all">
                                            @endif
                                        </li>
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

                            <div class="text-2xl">
                                <button id="dropdownBairros" data-dropdown-toggle="bairros" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Bairros<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

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

                            <div class="text-2xl">
                                <button id="dropdownGenders" data-dropdown-toggle="genders" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Gênero<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

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

                            <div class="text-2xl">
                                <button id="dropdownYearsOld" data-dropdown-toggle="years_olds" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Idade<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

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

                            <div class="text-2xl">
                                <button id="dropdownExport" data-dropdown-toggle="export" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Exportar<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                                <div id="export" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                        <li class="flex flex-row justify-between px-1 cursor-pointer" wire:click="downloadPhone">Telefone</li>
                                        <li class="flex flex-row justify-between px-1 cursor-pointer">SMS</li>
                                        <li class="flex flex-row justify-between px-1 cursor-pointer">Mala direta</li>
                                    </ul>
                                </div>
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
                            </div>

                    </div>
                </div>

                <div class="max-w-7xl mx-auto {!! $viewTable !!}">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                        @if (session()->has('message'))
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                            <div class="flex">
                                <div>
                                <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                            </div>
                        @endif

                        <table class="table-fixed w-full">
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
                                        <a href="{{ route('phones.show', $client->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Visualizar</a>
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
</div>
