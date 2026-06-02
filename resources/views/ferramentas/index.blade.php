<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ferramentas') }}
        </h2>
    </x-slot>
    <div>
        <br>
        <div class='mx-auto sm:px-6 lg:px-8'>
            <button class=" px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                <a class='justify-ent' href="{{ route('ferramentas.create') }}">➕ Adicione um novo Equipamento/ Ferramenta</a>
            </button>
        </div>
    </div>
    
    @forelse($ferramentas as $ferramenta)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="h-28 bg-gradient-to-r from-yellow-500 via-blue-500 to-blue-800 relative overflow-hidden flex items-end justify-between p-4 border border-transparent rounded-md">
                            <div class="absolute inset-0 bg-black/20"></div>

                                <!--TÍTULO DA FERRAMENTA-->
                                <h3 class='text-3xl font-bold text-white line-clamp-2 relative z-10'>
                                    {{ $ferramenta->nome }}
                                </h3>
                                
                                <!--BOTÕES EDIT DELETE-->
                                <div class="flex gap-2 relative z-10">
                                    <a href="{{ route('ferramentas.edit', $ferramenta) }}" class="text-white-600 hover:text-white-900 bg-green-800 hover:bg-green-700 transition ease-in-out duration-150 border border-transparent rounded-md px-4 py-2">Edit</a>
                                    <form method="POST" action="{{ route('ferramentas.destroy', $ferramenta) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Tem certeza?')" class="text-white-600 hover:text-white-900 bg-red-800 hover:bg-red-700 transition ease-in-out duration-150 border border-transparent rounded-md px-4 py-2">
                                            Deletar
                                        </button>
                                    </form>
                                </div>
                        </div>

                                <!--MOSTRAR CATEGORIA-->
                                <div class="mb-3">
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-white bg-blue-900 rounded-full">
                                        @foreach ($categorias as $categoria)
                                            @if($categoria->id == $ferramenta->categorias_id)
                                                Categoria #{{ $categoria->Equipamento }}
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                        
                                <!--CONTEÚDO DA FERRAMENTA (TABELA)-->
                                <div>
                                    <table class="min-w-full border-collapse border border-gray-300">
                                        <thead>
                                            <tr class="bg-gray-100 text-gray-800">
                                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Marca</th>
                                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Modelo</th>
                                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Material do Cabo</th>
                                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Tamanho da Chave</th>
                                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Tensão Elétrica</th>
                                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Peso</th>
                                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Quantidade</th>
                                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Estoque Mínimo</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 px-6 py-3 hover:text-gray-700 hover:bg-gray-50">{{ $ferramenta->marca }}</td>
                                                <td class="border border-gray-300 px-6 py-3 hover:text-gray-700 hover:bg-gray-50">{{ $ferramenta->modelo }}</td>
                                                <td class="border border-gray-300 px-6 py-3 hover:text-gray-700 hover:bg-gray-50">{{ $ferramenta->material_cabo }}</td>
                                                <td class="border border-gray-300 px-6 py-3 hover:text-gray-700 hover:bg-gray-50">{{ $ferramenta->tamanho_chave }}</td>
                                                <td class="border border-gray-300 px-6 py-3 hover:text-gray-700 hover:bg-gray-50">{{ $ferramenta->tensao_eletrica }}</td>
                                                <td class="border border-gray-300 px-6 py-3 hover:text-gray-700 hover:bg-gray-50">{{ $ferramenta->peso }}</td>
                                                <td class="border border-gray-300 px-6 py-3 hover:text-gray-700 hover:bg-gray-50">{{ $ferramenta->quanti_estoque }}</td>
                                                <td class="border border-gray-300 px-6 py-3 hover:text-gray-700 hover:bg-gray-50">{{ $ferramenta->estoque_min }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <br><br>

                                <!-- Mostrar imagem -->
                        @if($ferramenta->image)
                            <img src="{{ asset('storage/' . $ferramenta->image) }}" alt="{{ $ferramenta->nome }}" class=" items-center w-lg max-h-96 object-cover rounded-lg mb-4">
                        @else
                            <div class="w-full h-64 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                                <span class="text-gray-500">Sem imagem</span>
                            </div>
                        @endif

                                <!--RODAPÉ-->
                                <div class='flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700'>
                                    <!--                             
                                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-semibold text-sm transition-colors">
                                        Ler mais
                                    </a>
                                    <button class="text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    -->
                                </div>
                            
                        
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>Nenhuma ferramenta encontrada</p>
    @endforelse
</x-app-layout>

