<x-app-layout>
        <h3 class="text-gray-700 text-3xl font-medium">Biometria</h3>
        <div class=" flex justify-center">
            <div class=" shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
                <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Editar Biometria</h2> 
                <div class="p-6">
                <form method="POST" action="{{route('biometrias.update', ['biometria' => $biometria->id])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="weight">Peso (g)</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="weight" id="weight" step="0.01" value="{{$biometria->weight}}"  required>
                        </div>
    
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantity">Quantidade de Camarões</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="quantity" value="{{$biometria->quantity}}" required>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="viveiro_id">Viveiro</label>
                                <select name="viveiro_id" id="viveiro_id"  class="form-input w-full mt-2 rounded-md focus:border-indigo-600">
                                    @foreach ($viveiros as $viveiro)
                                        <option value="{{ $viveiro->id }}" 
                                        @if (isset($biometria) && $biometria->viveiro_id == $viveiro->id) selected @endif>
                                            {{ $viveiro->name }}
                                         </option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="date">Data</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="date" id="date" value="{{$biometria->date}}"  required>
                        </div>
                        
                        <div class="col-span-2 flex flex-col justify-center">
                            <label class="text-gray-700 mb-1" for="image">Imagem ( <small class="py-4">Deixe o campo vazio se não for editar ele</small> )</label>
                            <input class="form-input w-full mt-2 sm:mt-0 rounded-md focus:border-indigo-600" type="file" name="image" id="image" placeholder="">
                        </div>
                        
                        <div class=" col-span-2 flex flex-col">
                            <div class="mx-auto">
                            @if ($biometria->image)
                                <img src="{{ Storage::url($biometria->image) }}" alt="Imagem da biometria" class="h-72 object-cover rounded-md">
                            @endif
                        </div>
                        </div>
                        
                        <div class=" col-span-2 flex flex-col">
                            <label class="text-gray-700 mb-1" for="description">Observações</label>
                            <textarea class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="description" required>{{$biometria->description}}</textarea>
                        </div>
                    </div>
    
                    <div class="flex justify-end mt-6">
                        <a href="{{route("biometrias.index")}}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Editar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
</x-app-layout>