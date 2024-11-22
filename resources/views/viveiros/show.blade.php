<x-app-layout>
        <h3 class="text-gray-700 text-3xl font-medium mb-4">Detalhes do Viveiro</h3>

        <!-- Botão Voltar -->
        <div class="mb-6">
            <a href="{{ route('viveiros.index') }}">
                <button class="px-4 py-2 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500 transition duration-200 ease-in-out">
                    Voltar
                </button>
            </a>
        </div>

        <!-- Detalhes do Viveiro -->
        @if(isset($viveiro))
            <div class="mt-8">
                <div class="shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Viveiro: {{ $viveiro->id }}</h2>
                    <div class="mt-4 space-y-2">
                        <p class="text-gray-700"><strong>Área:</strong> {{ number_format($viveiro->area / 10000, 2) }} ha</p>
                        <p class="text-gray-700"><strong>Última Biometria:</strong> {{ $viveiro->gramatura ? $viveiro->gramatura . 'g' : 'Sem biometria' }}</p>
                        <p class="text-gray-700"><strong>Data Biometria:</strong> {{ $viveiro->date ? $viveiro->date : 'Sem biometria' }}</p>
                        @if ($viveiro->image)
                            <div class="mt-6">
                                <h3 class="text-lg font-medium text-gray-700">Foto da Biometria</h3>
                                <img src="{{ asset('storage/' . $viveiro->image) }}" alt="Imagem da Biometria" class="w-1/5 rounded-xl shadow-lg w-full h-auto transition-transform transform hover:scale-105" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <!-- Caso nenhum viveiro esteja disponível -->
            <div class="mt-8">
                <p class="text-gray-500 text-lg">Nenhum viveiro selecionado.</p>
            </div>
        @endif
</x-app-layout>