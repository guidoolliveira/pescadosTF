<!-- resources/views/biometrias/index.blade.php -->
<x-app-layout>
    <div class="container">
        <h1>Lista de Biometrias</h1>
        <a href="{{ route('biometrias.create') }}" class="btn btn-primary">Adicionar Biometria</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Viveiro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biometrias as $biometria)
                    <tr>
                        <td>{{ $biometria->viveiro->name }}</td>
                        <td>{{ $biometria->date }}</td>
                        <td>
                            <a href="{{ route('biometrias.show', $biometria) }}" class="btn btn-warning">Detalhes</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
