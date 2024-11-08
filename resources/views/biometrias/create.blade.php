<x-app-layout>
    <div class="container">
        <h1>Criar Biometria</h1>

        <form action="{{ route('biometrias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="weight">Peso</label>
                <input type="number" name="weight" id="weight" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="viveiro_id">Viveiro</label>
                <select name="viveiro_id" id="viveiro_id" class="form-control" required>
                    @foreach ($viveiros as $viveiro)
                        <option value="{{ $viveiro->id }}">{{ $viveiro->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</x-app-layout>