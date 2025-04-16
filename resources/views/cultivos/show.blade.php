<x-app-layout>
    <div class="p-5 mb-6 border rounded-2xl dark:border-gray-800 lg:p-6">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            {{-- Informações do cultivo --}}
            <div>
                <div class="mb-2">
                    <a href="{{ route('cultivos.index') }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-300">
                        ← Voltar para a lista de cultivos
                    </a>
                </div>
                <h3 class="text-3xl font-semibold mb-4 text-gray-800">Detalhes do Cultivo</h3>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                    <div>
                        <p class="mb-2 leading-normal text-gray-600">Viveiro</p>
                        <p class="font-medium text-gray-800">{{ $cultivo->viveiro->name }}</p>
                    </div>

                    <div>
                        <p class="mb-2 leading-normal text-gray-500">Status</p>
                        <div class="flex items-center space-x-4 mt-1 ml-1">
                            @if ($cultivo->status === 1)
                                <span class="text-green-600 font-semibold">Ativo</span>
                            @else
                                <span class="text-red-600 font-semibold">Finalizado</span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <p class="mb-2 leading-normal text-gray-500">Data de Início</p>
                        <p class="font-medium text-gray-800">{{ date('d/m/Y', strtotime($cultivo->data_inicio)) }}</p>
                    </div>

                    <div>
                        <p class="mb-2 leading-normal text-gray-500">Quantidade de Camarões</p>
                        <p class="font-medium text-gray-800">{{ $cultivo->quantidade_camarao }}</p>
                    </div>

                    @if ($cultivo->data_fim)
                        <div>
                            <p class="mb-2 leading-normal text-gray-500">Data de Fim</p>
                            <p class="font-medium text-gray-800">{{ date('d/m/Y', strtotime($cultivo->data_fim)) }}</p>
                        </div>
                    @endif

                    @if ($cultivo->viveiro->latestBiometria)
                        <div>
                            <p class="mb-2 leading-normal text-gray-500">Última Biometria</p>
                            <p class="font-medium text-gray-800">
                                {{ number_format($cultivo->viveiro->latestBiometria->shrimp_weight, 2, ',', '.') }}g
                                em {{ date('d/m/Y', strtotime($cultivo->viveiro->latestBiometria->date)) }}
                            </p>
                        </div>
                    @endif
                    <div class="mt-6 flex space-x-4 col-span-full">
                        <a href="{{ route('cultivos.edit', $cultivo->id) }}" class="text-blue-600 hover:text-blue-800 px-4 py-2 border border-blue-500 rounded-lg transition-colors duration-300">
                            Editar
                        </a>
                        <form action="{{ route('cultivos.destroy', $cultivo->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este cultivo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 px-4 py-2 border border-red-500 rounded-lg transition-colors duration-300">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Botão de finalização --}}
            @if ($cultivo->status === 1)
                <a href="{{ route('cultivos.finalizar', ['cultivo' => $cultivo->id]) }}"
                   onclick="return confirm('Tem certeza que deseja finalizar este cultivo?');">
                    <button class="flex w-full items-center bg-transparent justify-center gap-2 rounded-full border border-rose-300 px-4 py-3 font-medium text-rose-500 shadow-sm hover:border-rose-500 hover:text-rose-600 lg:inline-flex lg:w-auto">
                        <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 50 50" fill="currentColor" class="text-rose-500">
                            <path d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 37.690466 12.309534 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 13.390466 46 4 36.609534 4 25 C 4 13.390466 13.390466 4 25 4 z M 32.990234 15.986328 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.990234 15.986328 z"></path>
                        </svg>
                        Finalizar Cultivo
                    </button>
                </a>
            @endif
        </div>
    </div>

    {{-- Tabela de consumo --}}
    <h3 class="text-3xl font-semibold mb-4 text-gray-800">Consumo</h3>

@if ($consumoPorProduto->isNotEmpty())
    <div class="bg-white shadow rounded-md overflow-hidden my-6">
        <div class="overflow-x-auto">
            <table class="text-left w-full border-collapse table-layout-fixed">
                <thead class="border-b">
                    <tr>
                        <th class="py-3 px-5 bg-gray-900 text-sm text-gray-100 uppercase font-medium">Produto</th>
                        <th class="py-3 px-5 bg-gray-900 text-sm text-gray-100 uppercase font-medium">Último Uso</th>
                        <th class="py-3 px-5 bg-gray-900 text-sm text-gray-100 uppercase font-medium">Data</th>
                        <th class="py-3 px-5 bg-gray-900 text-sm text-gray-100 uppercase font-medium">Quantidade Total (kg)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consumoPorProduto as $consumo)
                        <tr class="hover:bg-gray-200">
                            <td class="py-4 px-6 border-b text-gray-800 text-base">
                                {{ $consumo['produto'] }}
                            </td>
                            <td class="py-4 px-6 border-b text-gray-800 text-base">
                                {{ number_format($consumo['ultimo_consumo'], 2, ',', '.') }} kg
                            </td>
                            <td class="py-4 px-6 border-b text-gray-800 text-base">
                                @if ($consumo['data_ultimo_consumo'])
                                    {{ \Carbon\Carbon::parse($consumo['data_ultimo_consumo'])->format('d/m/Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-4 px-6 border-b text-gray-800 text-base">
                                {{ number_format($consumo['quantidade_total'], 2, ',', '.') }} kg
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
@else
    <div class="flex items-center justify-center h-64">
        <p class="text-gray-500 text-3xl text-center">Nenhum uso registrado para este cultivo.</p>
    </div>
@endif


</x-app-layout>
