<x-app-layout>
    @if ($errors->any)
    @foreach ($errors->all() as $error)
    <div class="relative">
        <div class="alert-box inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50">
            <div class="flex justify-center items-center w-12 bg-red-500">
                <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                </svg>
            </div>
        
            <div class="-mx-3 py-2 px-4 flex-1">
                <div class="mx-3">
                    <span class="text-red-500 font-semibold">Erro</span>
                    <p class="text-gray-600 text-sm">{{$error}}</p>
                </div>
            </div>
        
            <button onclick="this.closest('.alert-box').remove()" 
                    class="text-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>        
    @endforeach
@endif
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
                            <label class="text-gray-700 mb-1" for="weight">Peso* (g)</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="peso" id="weight" step="0.01" value="{{$biometria->weight}}"  required>
                        </div>
    
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantity">Quantidade de Camarões*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="quantidade" value="{{$biometria->quantity}}" required>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="viveiro_id">Viveiro*</label>
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
                            <label class="text-gray-700 mb-1" for="date">Data*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="data" id="date" value="{{$biometria->date}}"  required>
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
                            <label class="text-gray-700 mb-1" for="description">Observações*</label>
                            <textarea class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="observacao" required>{{$biometria->description}}</textarea>
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