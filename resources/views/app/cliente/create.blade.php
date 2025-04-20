@extends('app.layouts.basico')

@section('titulo', 'Novo Cliente')


@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            
            <p>Adicionar Novo Cliente</p>
            
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
                
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <p style='color: rgb(212, 134, 33)'></p>{{ $msg ?? ''}} </p>

                @component('app.cliente._components.form_create_edit')
                @endcomponent
            </div>
        </div>
        
    </div>

@endsection