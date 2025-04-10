<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Biometria</h3>
    <div class="mt-4 flex justify-center">
        <div class="shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Cadastrar Biometria</h2>
            <div class="p-6">
                <form method="POST" action="{{ route('biometrias.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="weight">Peso* (g)</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="peso" id="weight" step="0.01" value="{{ old('peso') }}" required>
                            @error('peso')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantity">Quantidade de Camarões*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="quantidade" value="{{ old('quantidade') }}" required>
                            @error('quantidade')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="viveiro_id">Viveiro*</label>
                            <select name="viveiro_id" id="viveiro_id" class="form-input w-full mt-2 rounded-md focus:border-indigo-600">
                                <option value="">Selecione um Viveiro</option>
                                @foreach ($viveiros as $viveiro)
                                    <option value="{{ $viveiro->id }}" {{ old('viveiro_id') == $viveiro->id ? 'selected' : '' }}>
                                        {{ $viveiro->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('viveiro_id')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="date">Data*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="data" id="date" value="{{ old('data') }}" required>
                            @error('data')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-2 flex flex-col">
                            <label class="text-gray-700 mb-1" for="image">Imagem</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" name="image" id="image">
                            @error('image')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-2 flex flex-col">
                            <label class="text-gray-700 mb-1" for="description">Observações*</label>
                            <textarea class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="observacao" required>{{ old('observacao') }}</textarea>
                            @error('observacao')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('biometrias.index') }}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
