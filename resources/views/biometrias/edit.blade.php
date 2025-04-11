<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Biometria</h3>

    <div class="flex justify-center">
        <div class="shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Editar Biometria</h2>
            <div class="p-6">
                <form method="POST" action="{{ route('biometrias.update', ['biometria' => $biometria->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        {{-- Peso --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="weight">Peso* (g)</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('peso') border-red-500 @enderror" 
                                   type="number" step="0.01" name="peso" id="weight" value="{{ old('peso', $biometria->weight) }}" required>
                            @error('peso')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Quantidade --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantidade">Quantidade de Camarões*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('quantidade') border-red-500 @enderror" 
                                   type="number" name="quantidade" value="{{ old('quantidade', $biometria->quantity) }}" required>
                            @error('quantidade')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Viveiro --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="viveiro_id">Viveiro*</label>
                            <select name="viveiro_id" id="viveiro_id" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('viveiro_id') border-red-500 @enderror">
                                @foreach ($viveiros as $viveiro)
                                    <option value="{{ $viveiro->id }}" @selected(old('viveiro_id', $biometria->viveiro_id) == $viveiro->id)>
                                        {{ $viveiro->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('viveiro_id')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Data --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="date">Data*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('data') border-red-500 @enderror"
                                   type="date" name="data" id="date" value="{{ old('data', $biometria->date) }}" required>
                            @error('data')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Imagem --}}
                        <div class="col-span-2 flex flex-col justify-center">
                            <label class="text-gray-700 mb-1" for="image">Imagem 
                                <small class="text-gray-500">(Deixe o campo vazio se não for editar)</small>
                            </label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('image') border-red-500 @enderror" 
                                   type="file" name="image" id="image">
                            @error('image')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Preview da Imagem --}}
                        <div class="col-span-2 flex flex-col">
                            <div class="mx-auto">
                                @if ($biometria->image)
                                    <img src="{{ Storage::url($biometria->image) }}" alt="Imagem da biometria" class="h-72 object-cover rounded-md">
                                @endif
                            </div>
                        </div>

                        {{-- Observações --}}
                        <div class="col-span-2 flex flex-col">
                            <label class="text-gray-700 mb-1" for="description">Observações*</label>
                            <textarea class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('observacao') border-red-500 @enderror" 
                                      name="observacao" required>{{ old('observacao', $biometria->description) }}</textarea>
                            @error('observacao')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('biometrias.index') }}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
