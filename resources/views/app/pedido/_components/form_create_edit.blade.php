@if(isset($pedido->id))
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('pedido.store') }}" method="post">
        @csrf
@endif

    <select name="cliente_id" id="cliente_id">
        <option value="" {{ isset($produto->id) ? 'disabled' : 'selected' }} >-- Selecione um cliente</option>

        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old($cliente->id)) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
        @endforeach
    </select>
    <span style="color: rgb(255, 149, 0);">{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}</span>

    

    <button type="submit" class="borda-branca">{{ isset($pedido->cliente_id) ? 'Atualizar' : 'Adicionar' }}</button>
</form>