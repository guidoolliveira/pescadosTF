<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="mt-4">
        <h4 class="text-gray-600">Model Form</h4>

        <div class="mt-4">
            <div class="max-w-sm w-full bg-white shadow-md rounded-md overflow-hidden border">
                <form action="{{route('viveiros.store')}}" method="POST">
                   
                    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
                        <h3 class="text-sm">Add Viveiro</h3>
                        <button>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                     @csrf
                    <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
                        <label class="text-xs">Name</label>

                        <div class="mt-2 relative rounded-md shadow-sm">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-600">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                </svg>
                            </span>

                            <input type="text" class="form-input w-full px-12 py-2 appearance-none rounded-md focus:border-indigo-600" name="name">
                        </div>
                    </div>

                    <div class="flex justify-between items-center px-5 py-3">
                        <button class="px-3 py-1 text-gray-700 text-sm rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none">Cancel</button>
                        <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Cultivo</h3>
                    <ul>
                       ($cultivos as $cultivo)
                            <li> cultivo->nome :  $cultivo->quantidade  kg</li>
                      
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Viveiro</h3>
                    <ul>
                       ($viveiros as $viveiro)
                            <li> $viveiro->nome :  $viveiro->quantidade_camarões  camarões</li>
                        
                    </ul>
                </div>
                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Produto de Menor Quantidade</h3>
                    @foreach($lowestQuantityProducts as $produto)
                            <li>{{ $produto->name }}: {{ $produto->quantity }} unidades</li>
                        @endforeach
                    
                </div>
               

                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Produtos Vencidos</h3>
                    <ul>
                        {{-- @foreach($produtosVencidos as $produto)
                            <li> $produto->nome : Vencido em  $produto->data_vencimento </li>
                        @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
