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

    <div class="container mx-auto p-6">
        <!-- Voltar para a lista de biometrias -->
        <div class="mb-4">
            <a href="{{ route('biometrias.index') }}" class="text-blue-600 hover:text-blue-800">
                ← Voltar para a lista de biometrias
            </a>
        </div>

        <!-- Exibição dos detalhes da biometria -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Detalhes da Biometria</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Viveiro -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700">Viveiro</h3>
                    <p class="text-gray-900">{{ $biometria->viveiro->name }}</p>
                </div>

                <!-- Data da Biometria -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700">Data da Biometria</h3>
                    <p class="text-gray-900">{{ date('d/m/Y', strtotime($biometria->date )) }}</p>
                </div>
            </div>

            <!-- Peso do Camarão -->
            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-700">Peso do Camarão</h3>
                <p class="text-gray-900">{{ number_format($biometria->shrimp_weight, 2) }}g</p>
            </div>

            <!-- Outros Detalhes da Biometria -->
            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-700">Observações</h3>
                <p class="text-gray-900">{{$biometria->description}}</p>
            </div>

            <!-- Exibição da Imagem (se houver) -->
            @if ($biometria->image)
            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-700">Imagem da Biometria</h3>
                <img src="{{ asset('storage/' . $biometria->image) }}" alt="Imagem da Biometria" class="rounded-lg w-full h-auto" />
            </div>
            @endif

            <!-- Botão de Edição ou Deleção -->
            <div class="mt-6 flex space-x-4">
                <a href="{{ route('biometrias.edit', $biometria->id) }}" class="text-blue-600 hover:text-blue-800 px-4 py-2 border border-gray-300 rounded-md">Editar</a>
                <form action="{{ route('biometrias.destroy', $biometria->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta biometria?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 px-4 py-2 border border-gray-300 rounded-md">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
