<x-app-layout>
        <h3 class="text-gray-700 text-3xl font-medium">Controle de Estoque</h3>
        <div class="mt-4 flex justify-center">
            <div class="p-6 shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
                <h2 class="text-xl text-gray-700 font-bold mb-6">Cadastrar Biometria</h2> 
                <form method="POST" action="{{route('biometrias.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="weight">Peso (g)</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="weight" id="weight" step="0.01" required>
                        </div>
    
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantity">Quantidade de Camarões</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="quantity" required >
                        </div>
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="viveiro_id">Viveiro</label>
                            <select name="viveiro_id" id="viveiro_id"  class="form-input w-full mt-2 rounded-md focus:border-indigo-600">
                                <option value="">Selecione um Viveiro</option>
                                @foreach ($viveiros as $viveiro)
                                    <option value="{{ $viveiro->id }}">{{ $viveiro->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="date">Data</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="date" id="date" required>
                        </div>
                        <div class=" col-span-2 flex flex-col">
                            <label class="text-gray-700 mb-1" for="image">Imagem </label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" name="image" id="image">
                        </div>
                        <div class=" col-span-2 flex flex-col">
                            <label class="text-gray-700 mb-1" for="description">Observações</label>
                            <textarea class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="description" required></textarea>
                        </div>
                    </div>
    
                    <div class="flex justify-end mt-6">
                        <a href="{{route("products.index")}}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>