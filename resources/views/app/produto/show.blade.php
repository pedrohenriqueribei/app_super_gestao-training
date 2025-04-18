@extends('app.layouts.basico')

@section('titulo', 'Produto - Adicionar')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Ver</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consultar</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <th>Peso</th>
                        <td>{{ $produto->peso }}</td>
                    </tr>
                    <tr>
                        <th>Unidade de medida</th>
                        <td>{{ $produto->unidade_id }}</td>
                    </tr>

                </table>
            </div>
        </div>
        
    </div>

@endsection