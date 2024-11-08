<!-- resources/views/biometrias/index.blade.php -->
<x-app-layout>
    <div class="container">
        <h1>Lista de Biometrias</h1>
        <a href="{{ route('biometrias.create') }}" class="btn btn-primary">Adicionar Biometria</a>

        <table class="table mt-4">
            <thead>
                <tr>

                    <th>Peso</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Viveiro</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biometrias as $biometria)
                    <tr>
                        <td>{{ $biometria->id }}</td>
                        <td>{{ $biometria->weight }}</td>
                        <td>{{ $biometria->quantity }}</td>
                        <td>{{ $biometria->date }}</td>
                        <td>{{ $biometria->description }}</td>
                        <td>{{ $biometria->viveiro->name }}</td>
                        <td>
                            @if ($biometria->image)
                                <img src="{{ asset('storage/' . $biometria->image) }}" alt="Imagem" width="100">
                            @else
                                <span>Sem imagem</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('biometrias.edit', $biometria) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('biometrias.destroy', $biometria) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
