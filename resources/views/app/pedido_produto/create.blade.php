@extends('app.layouts.basico')

@section('titulo', 'Adicionar Produto ao Pedido')


@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            
            <p>Adicionar Produto ao Pedido nº {{ $pedido->id }}</p>
            
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                
            </ul>

        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>

            <p>ID do Pedido....... : {{ $pedido->id }}</p>
            <p>Cliente.............: {{ $pedido->cliente->nome }}</p>
            <p>Solicitado em.......: {{ $pedido->getCreatedAtFormatadoAttribute() }}</p>

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <p style='color: rgb(212, 134, 33)'></p>{{ $msg ?? ''}} </p>

                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent

                <h4>Itens do Pedido</h4>
                <table>
                    <tr>
                        <th>ID do produto</th>
                        <th>Descrição do Produto</th>
                    </tr>
                    @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
    </div>

@endsection