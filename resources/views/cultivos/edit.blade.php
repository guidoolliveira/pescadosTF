<x-app-layout> 
    <h3 class="text-gray-700 text-3xl font-medium">Cultivo</h3>

    <div class="flex justify-center">
        <div class="shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Editar Cultivo</h2>
            <div class="p-6">
                <form method="POST" action="{{ route('cultivos.update', ['cultivo' => $cultivo->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="viveiro_id">Viveiro*</label>
                            <select name="viveiro_id" id="viveiro_id" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('viveiro_id') border-red-500 @enderror">
                                @foreach ($viveiros as $viveiro)
                                    <option value="{{ $viveiro->id }}" @selected(old('viveiro_id', $cultivo->viveiro_id) == $viveiro->id)>
                                        {{ $viveiro->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('viveiro_id')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantidade_camarao">Quantidade de Camarões*</label>
                            <input type="number" name="quantidade_camarao" id="quantidade_camarao"
                                   value="{{ old('quantidade_camarao', $cultivo->quantidade_camarao) }}"
                                   class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('quantidade_camarao') border-red-500 @enderror" required>
                            @error('quantidade_camarao')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="data_inicio">Data de Início*</label>
                            <input type="date" name="data_inicio" id="data_inicio"
                                   value="{{ old('data_inicio', $cultivo->data_inicio) }}"
                                   class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('data_inicio') border-red-500 @enderror" required>
                            @error('data_inicio')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($cultivo->data_fim)
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="data_fim">Data de Fim</label>
                            <input type="date" name="data_fim" id="data_fim"
                                   value="{{ old('data_fim', $cultivo->data_fim) }}"
                                   class="form-input w-full mt-2 rounded-md focus:border-indigo-600" disabled>
                        </div>
                        @endif
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('cultivos.index') }}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
