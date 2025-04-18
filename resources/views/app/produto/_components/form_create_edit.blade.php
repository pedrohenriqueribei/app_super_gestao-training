@if(isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="post">
        @csrf
@endif


    <input type="text" name="nome" id="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
    <span style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>

    <input type="text" name="descricao" id="descricao"  value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
    <span style="color: red;">{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</span>

    <input type="text" name="peso" id="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="peso" class="borda-preta">
    <span style="color: red;">{{ $errors->has('peso') ? $errors->first('peso') : '' }}</span>

    <select name="unidade_id" id="unidade_id">
        <option value="">-- Selecione a Unidade de Medida</option>

        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''  }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    <span style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</span>

    <button type="submit" class="borda-branca">{{ isset($produto->id) ? 'Atualizar' : 'Adicionar' }}</button>
</form>