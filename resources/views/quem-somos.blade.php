<x-app-layout>
<div class="py-24" style="background: url('sobre-nos.jpg'); background-size: contain;">
<div class="container max-w-xl mx-auto flex items-start flex flex-col">
    @if(Session::has('success-mail'))

    <div class="mt-10 w-full bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div>
            <p class="font-bold">{{Session::get('success-mail')}}</p>
            <p class="font-bold">{{Session::get('details')}}</p>
            <p class="font-bold">{{Session::get('thanks')}}</p>
            </div>
        </div>
    </div>

    @endif

    <div class="p-10 bg-white">
        <h1 class="mb-10 mt-0">Quem Somos</h1>

        <p class="mb-5 text-justify">A Rebrax Assessoria atua na prestação de serviços técnicos especializados nas
        áreas de Administração de Empresas, Contábil, Engenharia de Dados, Business
        Intelligence, Pesquisas e Engenharia de Telecomunicações.</p>

        <p class="mb-5 text-justify">Através da competência de seus profissionais e dos seus parceiros terceirizados, a
        Rebrax Assessoria desenvolve projetos e modelos de negócios próprios ou para
        seus clientes, tanto no setor público, quanto no setor privado e caracteriza-se pela
        inovação, segurança e qualidade dos serviços prestados.</p>

        <p class="mb-5 text-justify">Entre em contato conosco e solicite um orçamento sem compromisso.</p>

        <p class="text-justify">Atuamos em todo o território nacional.</p>
    </div>
</div>
</div>
</x-app-layout>
