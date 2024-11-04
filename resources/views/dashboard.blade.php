<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Cultivo -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Cultivo</h3>
                    <ul>
                       ($cultivos as $cultivo)
                            <li> cultivo->nome :  $cultivo->quantidade  kg</li>
                      
                    </ul>
                </div>

                <!-- Viveiro -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Viveiro</h3>
                    <ul>
                       ($viveiros as $viveiro)
                            <li> $viveiro->nome :  $viveiro->quantidade_camarões  camarões</li>
                        
                    </ul>
                </div>

                <!-- Quantidade de Produto no Estoque -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Estoque de Produtos</h3>
                    <ul>
                        @foreach($products as $produto)
                            <li>{{ $produto->name }}: {{ $produto->quantity }} unidades</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Produto de Menor Quantidade -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Produto de Menor Quantidade</h3>
                    <p> $produtoMenorQuantidade->nome :  $produtoMenorQuantidade->quantidade  unidades</p>
                </div>

                <!-- Produto Vencido -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Produtos Vencidos</h3>
                    <ul>
                        @foreach($produtosVencidos as $produto)
                            <li> $produto->nome : Vencido em  $produto->data_vencimento </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
