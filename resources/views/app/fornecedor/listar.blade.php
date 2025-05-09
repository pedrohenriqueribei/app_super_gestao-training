@extends('app.layouts.basico')

@section('titulo', 'Fornecedor - Todos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">

            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consultar</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%"> 
                    <thead>
                        <tr>
                            <th>nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>Produtos</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>
                                    
                                    @foreach($fornecedor->produtos as $produto)
                                        <p>{{ $produto->formatarNomeComId() }}</p>
                                    @endforeach
                                    
                                </td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!--aula 158 - paginação -->
                {{ $fornecedores->appends($request)->links() }}
            </div>
            
            
        </div>
        
    </div>

@endsection