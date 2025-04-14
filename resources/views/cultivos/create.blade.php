<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Cultivo de Camarões</h3>
    <div class="mt-4 flex justify-center">
        <div class="shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Cadastrar Cultivo</h2>
            <div class="p-6">
                <form method="POST" action="{{ route('cultivos.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="viveiro_id">Viveiro*</label>
                            <select name="viveiro_id" id="viveiro_id" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" required>
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
                            <label class="text-gray-700 mb-1" for="data_inicio">Data de Início*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="data_inicio" id="data_inicio" value="{{ old('data_inicio') }}" required>
                            @error('data_inicio')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantidade_camarao">Quantidade de Camarões*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="quantidade_camarao" id="quantidade_camaroes" value="{{ old('quantidade_camaroes') }}" required>
                            @error('quantidade_camaroes')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('cultivos.index') }}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
