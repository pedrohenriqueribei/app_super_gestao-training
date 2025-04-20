@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista de Clientes</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                
            </ul>

        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>
                                
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Abrir</a></td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $cliente->id }}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id ]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!--aula 158 - paginação -->
                {{ $clientes->appends($request)->links() }}
            </div>
            
            
        </div>
        
    </div>

@endsection