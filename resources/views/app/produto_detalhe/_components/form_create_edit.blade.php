@if(isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto-detalhe.store') }}" method="post">
        @csrf
@endif


    <input type="text" name="produto_id" id="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="ID do Produto" class="borda-preta">
    <span style="color: red;">{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}</span>

    <input type="text" name="comprimento" id="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="comprimento" class="borda-preta">
    <span style="color: red;">{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}</span>
    
    <input type="text" name="largura" id="largura"  value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="largura" class="borda-preta">
    <span style="color: red;">{{ $errors->has('largura') ? $errors->first('largura') : '' }}</span>

    <input type="text" name="altura" id="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="altura" class="borda-preta">
    <span style="color: red;">{{ $errors->has('altura') ? $errors->first('altura') : '' }}</span>

    <select name="unidade_id" id="unidade_id">
        <option value="">-- Selecione a Unidade de Medida</option>

        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''  }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    <span style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</span>

    <button type="submit" class="borda-branca">{{ isset($produto_detalhe->id) ? 'Atualizar' : 'Adicionar' }}</button>
</form>