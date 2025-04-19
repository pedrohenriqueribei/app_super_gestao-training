@if(isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="post">
        @csrf
@endif

    <select name="fornecedor_id" id="fornecedor_id">
        <option value="" {{ isset($produto->id) ? 'disabled' : 'selected' }} >-- Selecione um fornecedor </option>

        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{ $fornecedor->nome }}</option>
        @endforeach
    </select>
    <span style="color: rgb(145, 24, 24);font-weight: 700;">{{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}</span>

    <input type="text" name="nome" id="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" >
    <span style="color: rgb(255, 149, 0);">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>

    <input type="text" name="descricao" id="descricao"  value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" >
    <span style="color: red;">{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</span>

    <input type="text" name="peso" id="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="peso" >
    <span style="color: red;">{{ $errors->has('peso') ? $errors->first('peso') : '' }}</span>

    <select name="unidade_id" id="unidade_id">
        <option value="" {{ isset($produto->id) ? 'disabled' : 'selected' }} >-- Selecione a Unidade de Medida</option>

        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''  }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    <span style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</span>

    <button type="submit" class="borda-branca">{{ isset($produto->id) ? 'Atualizar' : 'Adicionar' }}</button>
</form>