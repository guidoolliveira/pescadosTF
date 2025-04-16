<x-app-layout>
    <div class="relative">
        @if (session()->has('success'))
            <div class="alert-box inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50">
                <div class="flex justify-center items-center w-12 bg-green-500">
                    <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                    </svg>
                </div>
                <div class="-mx-3 py-2 px-4 flex-1">
                    <div class="mx-3">
                        <span class="text-green-500 font-semibold">Sucesso</span>
                        <p class="text-gray-600 text-sm">{{ session()->get('success') }}</p>
                    </div>
                </div>
                <button onclick="this.closest('.alert-box').remove()" 
                    class="text-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="alert-box inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50">
                <div class="flex justify-center items-center w-12 bg-red-500">
                    <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                    </svg>
                </div>
                <div class="-mx-3 py-2 px-4 flex-1">
                    <div class="mx-3">
                        <span class="text-red-500 font-semibold">Erro</span>
                        <p class="text-gray-600 text-sm">{{ session()->get('message') }}</p>
                    </div>
                </div>
                <button onclick="this.closest('.alert-box').remove()" 
                    class="text-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <h3 class="text-gray-700 text-3xl font-medium">Biometria</h3>

    <div class="flex justify-center">
        <div class="shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Editar Biometria</h2>
            <div class="p-6">
                <form method="POST" action="{{ route('biometrias.update', ['biometria' => $biometria->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="weight">Peso* (g)</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('peso') border-red-500 @enderror" 
                                   type="number" step="0.01" name="peso" id="weight" value="{{ old('peso', $biometria->weight) }}" required>
                            @error('peso')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="quantidade">Quantidade de Camarões*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('quantidade') border-red-500 @enderror" 
                                   type="number" name="quantidade" value="{{ old('quantidade', $biometria->quantity) }}" required>
                            @error('quantidade')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="viveiro_id">Viveiro*</label>
                            <select name="viveiro_id" id="viveiro_id" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('viveiro_id') border-red-500 @enderror">
                                @foreach ($viveiros as $viveiro)
                                    <option value="{{ $viveiro->id }}"
                                        style="color: {{ $viveiro->cultivo_ativo ? 'green' : 'red' }};"
                                        {{ old('viveiro_id') == $viveiro->id ? 'selected' : '' }}>
                                        {{  $viveiro->name }} - {{ $viveiro->cultivo_ativo ? 'Ativo' : 'Inativo' }}
                                    </option>                         
                                @endforeach
                            </select>
                            @error('viveiro_id')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="date">Data*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('data') border-red-500 @enderror"
                                   type="date" name="data" id="date" value="{{ old('data', $biometria->date) }}" required>
                            @error('data')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

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

                        <div class="col-span-2 flex flex-col">
                            <div class="mx-auto">
                                @if ($biometria->image)
                                    <img src="{{ Storage::url($biometria->image) }}" alt="Imagem da biometria" class="h-72 object-cover rounded-md">
                                @endif
                            </div>
                        </div>

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
