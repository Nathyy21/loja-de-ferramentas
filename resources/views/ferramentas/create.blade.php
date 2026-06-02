<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Ferramentas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST"  action="{{ route('ferramentas.store')}}" enctype="multipart/form-data">
                        @csrf

                        <!--NOME-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="nome">Nome:</label>
                            </div>
                            <input type="text" name="nome" id="nome" class="border-gray-300 w-[70%] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div><br>

                        <!--MARCA-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="marca">Marca:</label>
                            </div>
                            <input type="text" name="marca" id="marca" class="border-gray-300 w-[70%] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div><br>

                        <!--MODELO-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="modelo">Modelo:</label>
                            </div>
                            <input type="text" name="modelo" id="modelo" class="border-gray-300 w-[70%] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div><br>

                        <!--MATERIAL DO CABO-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="material_cabo">Material do Cabo:</label>
                            </div>
                            <input type="text" name="material_cabo" id="material_cabo" class="border-gray-300  w-[70%] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div><br>

                        <!--TAMANHO DA CHAVE-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="tamanho_chave">Tamanho da Chave:</label>
                            </div>
                            <input type="text" name="tamanho_chave" id="tamanho_chave" class="border-gray-300 w-[70%] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div><br>

                        <!--TENSÃO-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="tensao_eletrica">Tensão Elétrica:</label>
                            </div>
                            <input type="text" name="tensao_eletrica" id="tensao_eletrica" class="border-gray-300 w-[70%] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div><br>

                        <!--Peso-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="peso">Peso:</label>
                            </div>
                            <input type="text" name="peso" id="peso" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div><br>

                        <!--QUANTIDADE-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="quanti_estoque">Quantidade no Estoque:</label>
                            </div>
                            <input type="text" name="quanti_estoque" id="quanti_estoque" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div>

                        <!--ESTOQUE MÍNIMO-->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="estoque_min">Estoque Mínimo:</label>
                            </div>
                            <input type="text" name="estoque_min" id="estoque_min" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"> 
                        </div>
                        
                        <!-- NOVO INPUT DE IMAGEM -->
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="image">Imagem do Post:</label>
                            </div>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100"> 
                            </div>
                            <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF até 2MB</p>
                            
                            <!-- Preview da imagem -->
                            <img id="preview" class="mt-4 max-h-64 rounded-lg" style="display:none;" alt="Preview">
                        </div>

                        <!--SELECT CATEGORIA-->
                        <div>
                            <div class="mb-2">
                                <label for="categorias_id">Categorias:</label>
                            </div>
                            <select id="categorias_id" name="categorias_id" required class="w-full col-start-1 row-start-1 appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                <option value="">Selecione uma categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->Equipamento}}</option>
                                @endforeach
                            </select>                            
                        </div>

                        <br><br>

                        <div class="flex gap-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150">
                                Salvar
                            </button>
                            <a href="{{ route('ferramentas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview de imagem
        const fileInput = document.getElementById('image');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
