<x-app-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Controle de Estoque</h3>

    <div class="mt-4">
        <a class="flex flex-row-reverse text-gray-600" href="{{route('dashboard')}}"><button class="px-4 py-2 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Cadastrar</button></a>
        
        <div class="mt-6">
            <div class="bg-white shadow rounded-md overflow-hidden my-6">
                <table class="text-left w-full border-collapse">
                    <thead class="border-b">
                        <tr>
                            <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Produto</th>
                            <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Quantidade</th>
                            <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Data de Validade</th>
                            <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr class="hover:bg-gray-200">
                                <td class="py-4 px-6 border-b text-gray-700 text-lg">{{$p->name}}</td>
                                <td class="py-4 px-6 border-b text-gray-500">{{$p->quantity}}</td>
                                <td class="py-4 px-6 border-b text-gray-500">{{$p->validity}}</td>
                                <td class="py-4 px-6 border-b text-red-400"><a href="{{route('dashboard')}}">Editar</a></td>
                            </tr>
                        @endforeach
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>