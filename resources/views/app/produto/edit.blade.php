@extends('app.layouts.basico')

@section('titulo', 'Produto - Atualizar')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Editar</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="{{ route('produto.index') }}">Consultar</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <p style='color: rgb(33, 212, 33)'></p>{{ $msg ?? ''}} </p>
                
                @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades])
                @endcomponent
            </div>
        </div>
        
    </div>

@endsection