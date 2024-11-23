<x-app-layout>
    <div class="relative">
        @if (session()->has('success'))
            <div class="alert-box inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50">
                <div class="flex justify-center items-center w-12 bg-green-500">
                    <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                    </svg>
                </div>
                <div class="-mx-3 py-2 px-4">
                    <div class="mx-3">
                        <span class="text-green-500 font-semibold">Sucesso</span>
                        <p class="text-gray-600 text-sm">{{ session()->get("success") }}</p>
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

    <h3 class="text-gray-700 text-3xl font-medium">Controle de Estoque</h3>
<div class="text-right ">
    <a class="" href="{{ route('products.create') }}">
        <button class="px-4 py-2 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Cadastrar</button>
    </a>
</div>
@if ($products->isNotEmpty())
    <div class="bg-white shadow rounded-md overflow-hidden my-6">
        <div class="overflow-x-auto"> 
            <table class="text-left w-full border-collapse">
                <thead class="border-b">
                    <tr>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Produto</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Quantidade</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Lote</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Data de Validade</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr class="hover:bg-gray-200">
                            <td class="py-4 px-6 border-b text-gray-800 text-lg">{{ $p->name }}</td>
                            <td class="py-4 px-6 border-b text-gray-600">{{ $p->quantity }}</td>
                            <td class="py-4 px-6 border-b text-gray-600">{{ date('d/m/Y', strtotime($p->lot )) }}</td>
                            <td class="py-4 px-6 border-b text-gray-600">{{ date('d/m/Y', strtotime($p->validity )) }}</td>
                            <td class="py-4 px- border-b whitespace-nowrap">
                                <a class="text-blue-600 hover:text-blue-800 mr-4" href="{{ route('products.edit', ['product' => $p->id]) }}">Editar</a> 
                                <form class="inline" action="{{ route('products.destroy', ['product' => $p->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="text-red-600 hover:text-red-800">Excluir</button>
                                </form>
                            </td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        <div class="flex items-center justify-center h-64">
            <p class="text-gray-500 text-3xl text-center">Nenhum produto cadastrado no estoque.</p>
        </div>
    @endif
</x-app-layout>
