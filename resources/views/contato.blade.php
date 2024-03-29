<x-app-layout>
<div class="container max-w-xl mx-auto flex justify-center pt-0 pb-10">
    <div class="px-10 md:px-0">
        <div>
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h1 class="mb-10 mt-10">Contato</h1>
                    <p class="mb-2 text-sm text-gray-600">
                    Entre em contato conosco através do formulário abaixo e solicite um orçamento.
                    </p>
                </div>
            </div>
            <div class="md:col-span-2">
                <form action="{{ route('contact.mail') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-12 md:col-span-8">
                                <label for="name" class="block text-sm font-medium text-gray-700">Identifição<span class="text-red-600 pl-1">*</span></label>

                                <select name="identificacao" class="mt-1 form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none {{ $errors->has('identificacao') ? 'border-red-500' : '' }}">
                                    <option selected disabled hidden></option>
                                    <option value="Pessoa física">Pessoa física</option>
                                    <option value="Pessoa jurídica">Pessoa jurídica</option>
                                </select>
                                @if ($errors->has('identificacao'))
                                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('identificacao') }}</p>
                                @endif
                            </div>

                            <div class="col-span-12 md:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nome/Razão Social<span class="text-red-600 pl-1">*</span></label>
                                <input type="text" name="name" id="name"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md {{ $errors->has('name') ? 'border-red-500' : '' }}">
                                @if ($errors->has('name'))
                                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                            <div class="col-span-12 md:col-span-8">
                                <label for="name" class="block text-sm font-medium text-gray-700">E-mail<span class="text-red-600 pl-1">*</span></label>
                                <input type="email" name="email" id="name"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md {{ $errors->has('email') ? 'border-red-500' : '' }}">
                                @if ($errors->has('email'))
                                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="col-span-12 md:col-span-4">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Telefone<span class="text-red-600 pl-1">*</span></label>
                                <input type="text" name="phone" id="phone" maxlength="15" pattern="\(\d{2}\)\s*\d{5}-\d{4}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md {{ $errors->has('phone') ? 'border-red-500' : '' }}">
                                @if ($errors->has('phone'))
                                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>

                            <div class="col-span-12 md:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Estado<span class="text-red-600 pl-1">*</span></label>

                                <select name="state" class="mt-1 form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none {{ $errors->has('state') ? 'border-red-500' : '' }}">
                                    <option selected disabled hidden></option>
                                    <option value="São Paulo">São Paulo</option>
                                    <option value="Paraná">Paraná</option>
                                    <option value="Santa Catarina">Santa Catarina</option>
                                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                    <option value="Rondônia">Rondônia</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Roraima">Roraima</option>
                                    <option value="Pará">Pará</option>
                                    <option value="Amapá">Amapá</option>
                                    <option value="Tocantins">Tocantins</option>
                                    <option value="Maranhão">Maranhão</option>
                                    <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                    <option value="Paraíba">Paraíba</option>
                                    <option value="Pernambuco">Pernambuco</option>
                                    <option value="Alagoas">Alagoas</option>
                                    <option value="Sergipe">Sergipe</option>
                                    <option value="Bahia">Bahia</option>
                                    <option value="Minas Gerais">Minas Gerais</option>
                                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                                    <option value="Mato Grosso">Mato Grosso</option>
                                    <option value="Goiás">Goiás</option>
                                    <option value="Distrito Federa">Distrito Federal</option>
                                    <option value="Piauí">Piauí</option>
                                    <option value="Ceará">Ceará</option>
                                    <option value="Espírito Santo">Espírito Santo</option>
                                </select>
                                @if ($errors->has('state'))
                                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('state') }}</p>
                                @endif
                            </div>

                            <div class="col-span-12 md:col-span-8">
                                <label for="name" class="block text-sm font-medium text-gray-700">Cidade<span class="text-red-600 pl-1">*</span></label>

                                <input type="text" name="city" id="city"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md {{ $errors->has('city') ? 'border-red-500' : '' }}">
                                @if ($errors->has('city'))
                                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('city') }}</p>
                                @endif
                            </div>

                            <div class="col-span-12">
                                <label for="name" class="block text-sm font-medium text-gray-700">Descrição<span class="text-red-600 pl-1">*</span></label>
                                <textarea name="descricao" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none {{ $errors->has('descricao') ? 'border-red-500' : '' }}" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @if ($errors->has('descricao'))
                                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('descricao') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-amber-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Enviar
                        </button>
                    </div>
                    </div>
                </form>
            </div>
            <p class="text-right mt-2">Se preferir, mantenha contato pelo <a class="font-medium" href="https://api.whatsapp.com/send?phone=553884096996&text=Olá">WhatsApp</a></p>
        </div>
    </div>
</div>
<script>
  const tel = document.getElementById('phone') // Seletor do campo de telefone

  tel.addEventListener('keyup', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
  tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

  const mascaraTelefone = (valor) => {
      valor = valor.replace(/\D/g, "")
      valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
      valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
      tel.value = valor // Insere o(s) valor(es) no campo
  }
</script>
</x-app-layout>
