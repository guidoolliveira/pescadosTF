<x-app-layout>
    <div class="relative">
        @if (session()->has('success'))
            <div class="alert-box inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50">
                <div class="flex justify-center items-center w-12 bg-green-500">
                    <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40">
                        <path d="M20 3.333C10.8 3.333 3.333 10.8 3.333 20S10.8 36.667 20 36.667 36.667 29.2 36.667 20 29.2 3.333 20 3.333ZM16.667 28.333 8.333 20l2.35-2.35 6.984 5.966L29.317 10.967 31.667 13.333 16.667 28.333Z" />
                    </svg>
                </div>
                <div class="-mx-3 py-2 px-4 flex-1">
                    <div class="mx-3">
                        <span class="text-green-500 font-semibold">Sucesso</span>
                        <p class="text-gray-600 text-sm">{{ session()->get('success') }}</p>
                    </div>
                </div>
                <button onclick="this.closest('.alert-box').remove()" class="text-gray-400 hover:text-gray-700 focus:outline-none rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <h3 class="text-gray-700 text-3xl font-medium mb-6">Uso Diário</h3>
    <div class="text flex justify-between mb-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-700 leading-tight">Viveiro</h2>
            <div class="mt-2">
                <select class="appearance-none border bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none rounded" onchange="window.location.href=this.value;">
                    <option value="{{ route('uso_diario.index') }}">Todos os Viveiros</option>
                    @foreach ($viveiros as $viveiro)
                        <option value="{{ route('uso_diario.index', ['viveiro_id' => $viveiro->id]) }}" {{ request('viveiro_id') == $viveiro->id ? 'selected' : '' }}>
                            {{ $viveiro->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <a href="{{ route('uso_diario.create') }}">
            <button class="mt-8 px-4 py-2 bg-gray-600 rounded-md text-white font-medium hover:bg-gray-500">Novo Uso</button>
        </a>
    </div>
    @php
                        if (isset($_GET["viveiro_id"])) {
                            $usoDiario = $usoDiario->where('viveiro_id', $_GET["viveiro_id"]);
                        }
                        @endphp
    @if ($usoDiario->isNotEmpty())
        <div class="bg-white shadow rounded-md overflow-hidden my-6">
            <div class="overflow-x-auto">
                <table class="text-left w-full border-collapse">
                    <thead class="border-b">
                        <tr>
                            <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Viveiro</th>
                            <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Produto</th>
                            <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Quantidade</th>
                            <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Data</th>
                            <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($usoDiario as $uso)
                            <tr class="hover:bg-gray-200">
                                <td class="py-4 px-6 border-b text-gray-600">{{ $uso->viveiro->name }}</td>
                                <td class="py-4 px-6 border-b text-gray-800">{{ $uso->produto->name }}</td>
                                <td class="py-4 px-6 border-b text-gray-600">{{ $uso->quantidade_utilizada }}kg</td>
                                <td class="py-4 px-6 border-b text-gray-600">{{ date('d/m/Y', strtotime($uso->data)) }}</td>
                                <td class="py-4 border-b whitespace-nowrap">
                                    <a class="text-blue-600 hover:text-blue-800 mr-4" href="{{ route('uso_diario.edit', $uso->id) }}">Editar</a>
                                    <form action="{{ route('uso_diario.destroy', $uso->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Deseja excluir este uso?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p class="text-gray-500 text-3xl text-center">Nenhum uso diário registrado.</p>
    @endif
</x-app-layout>