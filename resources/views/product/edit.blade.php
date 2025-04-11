<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Controle de Estoque</h3>

    <div class="mt-4 flex justify-center">
        <div class="shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Editar Produto</h2>
            <div class="p-6">
                <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        {{-- Nome --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="nome">Nome*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('nome') border-red-500 @enderror"
                                   type="text" name="nome" value="{{ old('nome', $product->name) }}" required>
                            @error('nome')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Quantidade --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantidade">Quantidade*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('quantidade') border-red-500 @enderror"
                                   type="number" name="quantidade" value="{{ old('quantidade', $product->quantity) }}" required>
                            @error('quantidade')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Lote --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="lote">Lote*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('lote') border-red-500 @enderror"
                                   type="date" name="lote" value="{{ old('lote', $product->lot) }}" required>
                            @error('lote')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Validade --}}
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="validade">Data de Validade*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('validade') border-red-500 @enderror"
                                   type="date" name="validade" value="{{ old('validade', $product->validity) }}" required>
                            @error('validade')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('products.index') }}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
