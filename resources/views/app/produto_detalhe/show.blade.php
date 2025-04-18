@extends('app.layouts.basico')

@section('titulo', ' Mostrar Detalhes de Produtos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Mostrar detalhes de produtos</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('produto-detalhe.index') }}">Voltar</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <td>{{ $produto_detalhe->id }}</td>
                    </tr>
                    <tr>
                        <th>Produto</th>
                        <td>{{ $produto_detalhe->produto_id }}</td>
                    </tr>
                    <tr>
                        <th>Comprimento</th>
                        <td>{{ $produto_detalhe->comprimento }}</td>
                    </tr>
                    <tr>
                        <th>Largura</th>
                        <td>{{ $produto_detalhe->largura }}</td>
                    </tr>
                    <tr>
                        <th>Altura</th>
                        <td>{{ $produto_detalhe->altura }}</td>
                    </tr>
                    <tr>
                        <th>Unidade de medida</th>
                        <td>{{ $produto_detalhe->unidade_id }}</td>
                    </tr>

                </table>
            </div>
        </div>
        
    </div>

@endsection