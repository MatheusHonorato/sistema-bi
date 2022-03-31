<div>
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <form>
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
      <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Tipo</th>
                        <th class="px-4 py-2 w-20">DDD</th>
                        <th class="px-4 py-2">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phones as $phone)
                    <tr>
                        <td class="border px-4 py-2">
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
                        </td>
                        <td class="border px-4 py-2">({{ $phone->ddd }})</td>
                        <td class="border px-4 py-2">{{ substr($phone->phone, 0, 5) }} - {{ substr($phone->phone, 5, 9) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      </div>

      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

          <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Sair
          </button>
        </span>
        </form>
      </div>

    </div>
  </div>
</div>
