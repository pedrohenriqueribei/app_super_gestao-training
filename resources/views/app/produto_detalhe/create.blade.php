@extends('app.layouts.basico')

@section('titulo', 'Produto Detalhes - Add')


@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            
            <p>Produto Detalhe - Adicionar</p>
            
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('produto-detalhe.index') }}">Voltar</a></li>
                
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <p style='color: rgb(212, 134, 33)'></p>{{ $msg ?? ''}} </p>

                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
                @endcomponent
            </div>
        </div>
        
    </div>

@endsection