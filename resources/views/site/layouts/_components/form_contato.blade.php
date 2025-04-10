<form action="{{ route('site.contato') }}" method="post">
    {{-- aula 68 token para requisicao post --}}
    @csrf

    {{-- aula 71 --}}
    <input type="text" value="{{ old('nome') }}" placeholder="Nome" name="nome" class="{{ $classe }}">
    {{ ($errors->has('nome')) ? $errors->first('nome') : ''}}
    <!-- Aula 136 -->
    
    <br>
    <input type="text" value="{{ old('telefone') }}" placeholder="Telefone" name="telefone" class="{{ $classe }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>

    <input type="text" value="{{ old('email') }}" placeholder="E-mail"  name="email" class="{{ $classe }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    
    
    
    <!-- aula 127 -->
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <!-- aula 127 -->
        @foreach ($motivos_contato as $key => $motivo )
            <option value="{{ $motivo->id }}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : ''}}> {{ $motivo->motivo_contato }} </option>                
        @endforeach
        <!--<option value="1"  old('motivo_contato') == 1 ? 'selected' : '' }}>Dúvida</option>
        <option value="2"  old('motivo_contato') == 2 ? 'selected' : '' }}>Elogio</option>
        <option value="3"  old('motivo_contato') == 3 ? 'selected' : '' }}>Reclamação</option>
        -->
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}

    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if($errors->any())
<div style="position:absolute; top:0px; left:0px; width:100%; background:red">
    @foreach ($errors->all() as $error)
        {{ $error  }}
        <br>
    @endforeach
</div>
@endif