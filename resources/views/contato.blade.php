<x-app-layout>
<div class="container max-w-xl mx-auto flex justify-center">
    <div class="px-10 md:px-0">
        <div class="mt-10">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h1 class="mb-10 mt-10">Contato</h1>
                    <p class="mb-2 text-sm text-gray-600">
                    Entre em contato conosco através do formulário abaixo e solicite um orçamento.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('contact.mail') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-12 md:col-span-8">
                                <label for="name" class="block text-sm font-medium text-gray-700">Identifição</label>

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
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                    <option selected disabled hidden></option>
                                    <option value="1">Pessoa física</option>
                                    <option value="2">Pessoa juridica</option>
                                </select>
                            </div>

                            <div class="col-span-12 md:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nome/Razão Social</label>
                                <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-12 md:col-span-8">
                                <label for="name" class="block text-sm font-medium text-gray-700">E-mail</label>
                                <input type="email" name="email" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-12 md:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Telefone</label>
                                <input type="text" name="phone" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-12 md:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Estado</label>

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
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                    <option selected disabled hidden></option>
                                    <option value="1">Minas Gerais</option>
                                </select>
                            </div>

                            <div class="col-span-12 md:col-span-8">
                                <label for="name" class="block text-sm font-medium text-gray-700">Cidade</label>

                                <select name="city" class="mt-1 form-select appearance-none
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
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                    <option selected disabled hidden></option>
                                    <option value="1">Montes Claros</option>
                                </select>
                            </div>

                            <div class="col-span-12">
                                <label for="name" class="block text-sm font-medium text-gray-700">Descrição</label>
                                <textarea name="descricao" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
</x-app-layout>
