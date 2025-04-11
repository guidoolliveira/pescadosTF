<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Viveiros</h3>

    <div class="mt-4 flex justify-center">
        <div class="shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Editar Viveiro</h2>
            <div class="p-6">
                <form method="POST" action="{{ route('viveiros.update', ['viveiro' => $viveiro->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        {{-- Nome do viveiro --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="name">Viveiro</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('nome') border-red-500 @enderror"
                                   type="text" name="nome" value="{{ old('nome', $viveiro->name) }}" required>
                            @error('nome')
                                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Largura --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="width">Largura</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('largura') border-red-500 @enderror"
                                   type="number" name="largura" value="{{ old('largura', $viveiro->width) }}" required>
                            @error('largura')
                                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Comprimento --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="length">Comprimento</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('comprimento') border-red-500 @enderror"
                                   type="number" name="comprimento" value="{{ old('comprimento', $viveiro->length) }}" required>
                            @error('comprimento')
                                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('viveiros.index') }}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
