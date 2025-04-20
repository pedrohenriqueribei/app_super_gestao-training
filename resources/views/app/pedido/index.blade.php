@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista de Pedidos</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                
            </ul>

        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Vincular</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente->nome }}</td>
                                <td>{{ $pedido->getCreatedAtFormatadoAttribute() }}</td>
                                <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produto</a></td>

                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Abrir</a></td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id ]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!--aula 158 - paginação -->
                {{ $pedidos->appends($request)->links() }}
            </div>
            
            
        </div>
        
    </div>

@endsection