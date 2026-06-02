<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('categorias.update', $categoria) }}">
                        @csrf <!--token de segurança obg em todos os forms-->
                        @method('PUT') <!--simula requisição put-->

                        <div class='mb-4'>
                            <label for="name" class='block text-gray-400 text-gray-400 text-sm font-bold md-2'>
                                Nome do Equipamento:
                            </label>
                            <input type="text" name='name' id='name' value='{{ $categoria->Equipamento}}' class="border-gray-300 w-[70%] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full px-3 py-2 text-gray-900"> 
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Salvar
                            </button>
                            <a href="{{ route('categorias.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
