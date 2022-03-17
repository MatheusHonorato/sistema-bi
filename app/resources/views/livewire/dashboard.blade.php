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
                                {{ $amount }}
                            </div>
                            <div>
                                <select wire:model="state_id">
                                    <option>Estado</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-2xl">
                                <select id="city_id" wire:model="city_id">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">

                        <div class="shadow-lg rounded-lg overflow-hidden">
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

                        <div class="shadow-lg rounded-lg overflow-hidden">

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
