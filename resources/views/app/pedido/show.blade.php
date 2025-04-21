@extends('app.layouts.basico')

@section('titulo', 'Pedido ')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido de {{ $pedido->cliente->nome }}</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:40%; margin-left: auto; margin-right: auto;">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <td>{{ $pedido->id }}</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>{{ $pedido->cliente->nome }}</td>
                    </tr>
                    <tr>
                        <th>Produtos</th>
                        <td>
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Data</th>
                                    <th>Excluir</th>
                                </tr>
                                @foreach ($pedido->produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->id }}</td>
                                        <td>{{ $produto->nome }}</td>
                                        <td>{{ $produto->pivot->quantidade }}</td>
                                        <td>{{ $produto->pivot->created_at->format('d/m/Y') }} </td>
                                        <td>
                                            <form id="form_{{$pedido->id}}_{{$produto->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()">X</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        
    </div>

@endsection