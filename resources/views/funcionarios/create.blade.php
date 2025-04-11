<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Funcionários</h3>
    <div class="mt-4 flex justify-center">
        <div class="shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Cadastrar Funcionário</h2> 
            <div class="p-6">
                <form method="POST" action="{{ route('funcionarios.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Nome -->
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="nome">Nome*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('nome') border-red-500 @enderror" type="text" name="nome" value="{{ old('nome') }}" required>
                            @error('nome')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Telefone -->
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="telefone">Telefone*</label>
                            <input id="telefone" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('telefone') border-red-500 @enderror" type="tel" name="telefone" value="{{ old('telefone') }}" placeholder="(__) _____-____" required>
                            @error('telefone')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Função -->
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="funcao">Função*</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('funcao') border-red-500 @enderror" type="text" name="funcao" value="{{ old('funcao') }}" required>
                            @error('funcao')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Salário -->
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-1" for="salario">Salário*</label>
                            <input id="salario" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 @error('salario') border-red-500 @enderror" name="salario" value="{{ old('salario') }}" required>
                            @error('salario')
                                <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('funcionarios.index') }}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @vite('resources/js/mascara-moeda.js')
    @vite('resources/js/mascara-telefone.js')
</x-app-layout>

