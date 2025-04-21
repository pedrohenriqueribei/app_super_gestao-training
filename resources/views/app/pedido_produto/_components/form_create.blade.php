<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
     @csrf

    <label for="produto_id">Vincular Produto</label>
    <select name="produto_id" id="produto_id">
        <option value="" selected >-- Selecione um Produto</option>

        @foreach($produtos as $produto)
            <option value="{{ $produto->id }}" {{ old('$produto_id') == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}</option>
        @endforeach
    </select>
    <span style="color: rgb(255, 149, 0);">{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}</span>

    <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') }}" min="1" max="10">
    <span style="color: rgb(255, 149, 0);">{{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}</span>

    <button type="submit" class="borda-branca">Vincular</button>
</form>