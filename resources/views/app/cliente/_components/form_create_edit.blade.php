@if(isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('cliente.store') }}" method="post">
        @csrf
@endif

    <input type="text" name="nome" id="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" >
    <span style="color: rgb(255, 149, 0);">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>

    

    <button type="submit" class="borda-branca">{{ isset($cliente->id) ? 'Atualizar' : 'Adicionar' }}</button>
</form>