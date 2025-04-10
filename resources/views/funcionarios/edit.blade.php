<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Funcionários</h3>
    <div class="mt-4 flex justify-center">
        <div class=" shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl py-3 rounded-t-lg px-6 text-white bg-gray-800 font-bold">Editar Funcionário</h2> 
            <div class="p-6">
            <form method="POST" action="{{route('funcionarios.update', ['funcionario' => $funcionario->id])}}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col">
                        <label class="text-gray-700 mb-1" for="nome">Nome*</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="nome" value="{{$funcionario->name}}" required>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-700 mb-1" for="telefone">Telefone*</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="tel" name="telefone" value="{{$funcionario->phone}}" required >
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-700 mb-1" for="funcao">Função*</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="funcao" value="{{$funcionario->function}}" required>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-gray-700 mb-1" for="salario">Salário*</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="" name="salario" value="{{$funcionario->salary}}" required>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <a href="{{route('funcionarios.index')}}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                    <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Salvar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</x-app-layout>
