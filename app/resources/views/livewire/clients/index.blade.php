<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                        <th class="px-4 py-2">Nome</th>
                        <th class="px-4 py-2">Telefone</th>
                        <th class="px-4 py-2">Rua</th>
                        <th class="px-4 py-2">Bairro</th>
                        <th class="px-4 py-2">Cidade</th>
                        <th class="px-4 py-2">UF</th>
                        <th class="px-4 py-2">CEP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td class="border px-4 py-2">{{ $client->id }}</td>
                        <td class="border px-4 py-2">{{ $client->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('phones.show', $client->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Visualizar</a>
                        </td>
                        <td class="border px-4 py-2">{{ $client->street }}</td>
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
