@extends('app.layouts.basico')

@section('titulo', 'Produto - Adicionar')


@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            
            <p>Produto - Adicionar</p>
            
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <p style='color: rgb(212, 134, 33)'></p>{{ $msg ?? ''}} </p>

                @component('app.produto._components.form_create_edit', ['unidades' => $unidades, 'fornecedores' => $fornecedores])
                @endcomponent
            </div>
        </div>
        
    </div>

@endsection