@extends('app.layouts.basico')

@section('titulo', 'Cliente ')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $cliente->nome }}</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>{{ $cliente->nome }}</td>
                    </tr>
                    

                </table>
            </div>
        </div>
        
    </div>

@endsection