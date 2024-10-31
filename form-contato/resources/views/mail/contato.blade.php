<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-white"> {{ __("Você tem uma nova mensagem") }}: </h2>

                <p class="text-white">De: {{ @$name }}</p>
                <p class="text-white">E-mail: {{ @$email }}</p>
                <p class="text-white">Titulo: {{ @$titulo }}</p>
                <p class="text-white">Assunto: {{ @$assunto }}</p>

            </div>
        </div>
    </div>
</x-guest-layout>
