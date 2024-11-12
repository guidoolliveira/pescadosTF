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

    <h3 class="text-gray-700 text-3xl font-medium">Biometrias</h3>

    <div class="text-right mb-4">
        <a href="{{ route('biometrias.create') }}">
            <button class="px-4 py-2 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Nova Biometria</button>
        </a>
    </div>
    <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-700 leading-tight">Users</h2>

            <div class="mt-3 flex flex-col sm:flex-row">
                <div class="flex">
                    <div class="relative">
                        
                        <select class="appearance-none h-full rounded-l border block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="window.location.href=this.value;">
                            <option value="">Selecione um Viveiro</option>
                            @foreach ($viveiros as $viveiro)
                                <option value="{{ route('biometrias.index', ['viveiro_id' => $viveiro->id]) }}" 
                                        @if(request()->viveiro_id == $viveiro->id) selected @endif>
                                    {{ $viveiro->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @if (isset($biometrias) && $biometrias->isNotEmpty())
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Viveiro</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Data da Biometria</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($biometrias as $b)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $b->viveiro->name }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $b->date }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <a class="text-blue-600 hover:text-blue-800 mr-4" href="{{ route('biometrias.show', ['biometria' => $b->id]) }}">Detalhes</a> </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else 
                <p class="text-gray-500 text-3xl text-center">Nenhuma biometria cadastrada para este viveiro.</p>
            @endif
        </div>
    </div>
    
</x-app-layout>
