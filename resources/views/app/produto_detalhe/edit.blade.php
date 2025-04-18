@extends('app.layouts.basico')

@section('titulo', 'Produto Detalhes - Editar')


@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            
            <p>Produto Detalhe - Atualizar</p>
            
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('produto-detalhe.index') }}">Voltar</a></li>
                
            </ul>

        </div>

        <div class="informacao-pagina">

            <h4>Produto</h4>
            <p>{{ $produto_detalhe->produto->nome }}</p>
            <span>{{ $produto_detalhe->produto->descricao }}</span>

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <p style='color: rgb(212, 134, 33)'></p>{{ $msg ?? ''}} </p>

                @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
                @endcomponent
            </div>
        </div>
        
    </div>

@endsection