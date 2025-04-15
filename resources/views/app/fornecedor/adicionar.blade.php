@extends('app.layouts.basico')

@section('titulo', 'Fornecedor - Cadastrar')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consultar</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <p style='color: rgb(33, 212, 33)'></p>{{ $msg ?? ''}} </p>
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    @csrf
                    <input type="text" name="nome" id="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    <span style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>

                    <input type="text" name="site" id="site"  value="{{ $fornecedor->site ?? old('site') }}"placeholder="Site" class="borda-preta">
                    <span style="color: red;">{{ $errors->has('site') ? $errors->first('site') : '' }}</span>

                    <input type="text" name="uf" id="uf" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF" class="borda-preta">
                    <span style="color: red;">{{ $errors->has('uf') ? $errors->first('uf') : '' }}</span>

                    <input type="text" name="email" id="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
                    <span style="color: red;">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

                    <!-- aula 157-->
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">

                    <button type="submit" class="borda-branca">Cadastrar</button>
                </form>
            </div>
        </div>
        
    </div>

@endsection