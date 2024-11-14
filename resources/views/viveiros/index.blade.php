<x-app-layout>
    <div class="relative">
        @if (session()->has('success'))
            <div class="inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50">
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
            </div>
        @endif
    </div>

    <h3 class="text-gray-700 text-3xl font-medium">Viveiros</h3>
<div class="text-right ">
    <a class="" href="{{ route('viveiros.create') }}">
        <button class="px-4 py-2 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Cadastrar</button>
    </a>
</div>
@if ($viveiros->isNotEmpty())
    <div class="bg-white shadow rounded-md overflow-hidden my-6">
        <div class="overflow-x-auto"> 
            <table class="text-left w-full border-collapse">
                <thead class="border-b">
                    <tr>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">#</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Área</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Última Biometria</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Data Biometria</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Status</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viveiros as $v)
                        <tr class="hover:bg-gray-200">
                            <td class="py-4 px-6 border-b text-gray-800 text-lg">{{ $v->name }}</td>
                            <td class="py-4 px-6 border-b text-gray-600">{{ $v->area/10000 }}ha</td>
                            <td class="py-4 px-6 border-b text-gray-600">{{ $v->gramatura . 'g' ?? 'Sem biometria'}}</td>
                            <td class="py-4 px-6 border-b text-gray-600">{{ $v->date ?? 'Sem biometria'}}</td>
                            <td class="py-4 px-6 border-b text-gray-600">{{ $v->date }}</td>
                            <td class="py-4 px-6 border-b whitespace-nowrap">
                                <a class="text-blue-600 hover:text-blue-800 mr-4" href="{{ route('viveiros.show', ['viveiro' => $v->id]) }}">Exibir</a> 
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