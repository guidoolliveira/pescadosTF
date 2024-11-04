<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Controle de Estoque</h3>
    <div class="mt-4 flex justify-center">
        <div class="p-6 shadow-lg w-full sm:w-1/2 rounded-lg mt-8">
            <h2 class="text-xl text-gray-700 font-bold mb-6">Cadastrar Produto</h2> 
            <form method="POST" action="{{route('products.store')}}">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="col-span-2 flex flex-col">
                        <label class="text-gray-700 mb-1" for="name">Nome</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="name" required>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-700 mb-1" for="quantity">Quantidade</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="quantity" required >
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-700 mb-1" for="validity">Data de Validade</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="validity" required>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <a href="{{route("products.index")}}" class="py-2 px-4 leading-tight border border-gray-200 text-blue-700 rounded-l mr-4">Voltar</a>
                    <button type="submit" class="px-6 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
