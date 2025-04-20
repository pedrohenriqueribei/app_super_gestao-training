@extends('app.layouts.basico')

@section('titulo', 'Atualizar Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Atualizar Pedido {{ $pedido->cliente_id }}</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">
           
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <p style='color: rgb(33, 212, 33)'></p>{{ $msg ?? ''}} </p>
                
                @component('app.pedido._components.form_create_edit', ['pedido' => $pedido, 'clientes' => $clientes])
                @endcomponent
            </div>
        </div>
        
    </div>

@endsection