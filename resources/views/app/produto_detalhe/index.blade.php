@extends('app.layouts.basico')

@section('titulo', 'Detalhes de Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhes de Produtos</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('produto-detalhe.create') }}">Novo</a></li>
                
            </ul>

        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%"> 
                    <thead>
                        <tr>
                            <th>Produto ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produto_detalhes as $produto_detalhe)
                            <tr>
                                <td>{{ $produto_detalhe->produto->nome }}</td>
                                <td>{{ $produto_detalhe->comprimento }}</td>
                                <td>{{ $produto_detalhe->altura }}</td>
                                <td>{{ $produto_detalhe->largura }}</td>
                                <td>{{ $produto_detalhe->unidade->descricao }}</td>
                                <td><a href="{{ route('produto-detalhe.show', ['produto_detalhe' => $produto_detalhe->id]) }}">Abrir</a></td>
                                <td><a href="{{ route('produto-detalhe.edit', ['produto_detalhe' => $produto_detalhe->id]) }}">Editar</a></td>
                                <td>
                                    <form id="">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $produto_detalhe->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!--aula 158 - paginação -->
                {{ $produto_detalhes->appends($request)->links() }}
            </div>
            
            
        </div>
        
    </div>

@endsection