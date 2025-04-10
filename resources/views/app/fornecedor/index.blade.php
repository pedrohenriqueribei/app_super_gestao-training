<h3>Fornecedor</h3>

{{-- AULA 45 - COMENTARIO PARA PAGINA BLADE --}}


@php
    //para comentário em php
    echo 'Teste de texto 3';

    $verificador = "Sucesso";
@endphp

<hr>

<h4>Sistema de Gestão de Departamento</h4>

{{ 'Teste de texto'}}
<?= 'Teste de texto 2'?>

<hr>

{{-- AULA 46  --}}

{{-- @dd($fornecedores) --}}


{{-- AULA 47  --}}
@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem menos de 10 fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem mais de 10 fornecedores</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif


{{-- AULA 48
@unless - executa o contrario do if
  --}}

{{-- //@dd($fornecedores) 

1 - Fornecedor {{ $fornecedores[0]['nome']}}
    Status {{ $fornecedores[0]['status']}}
    --}}
    {{-- aula 49 
    @isset($fornecedores[0]['cnpj'])
        CNPJ {{ $fornecedores[0]['cnpj'] }}
    @endisset

     aula 50 
    @empty($fornecedores[0]['cnpj'])
       - Vazio
    @endempty

    <br>
     aula 52 
    CNPJ {{ $fornecedores[0]['cnpj'] ?? ' Não informado'}}
<br>
2 - Fornecedor {{ $fornecedores[1]['nome']}}
    Status {{ $fornecedores[1]['status']}}
    @isset($fornecedores[1]['cnpj'])
        CNPJ {{ $fornecedores[1]['cnpj'] }}
    @endisset

    
     aula 50 
    @empty($fornecedores[1]['cnpj'])
       - Vazio
    @endempty

    <br>
    - aula 52 --
    CNPJ {{ $fornecedores[1]['cnpj'] ?? ' Não informado'}}
<br>
@unless($fornecedores[1]['status'] == 'S')
     "Teste unless"
@endunless

<br>
<br>
<hr>

@isset($verificador)
    Verificação feita com sucesso
@endisset

<br>
<br>
<hr>
--}}

{{-- Aula 57 --}}
@forelse ($fornecedores as $indice => $fornecedor)
    Fornecedor: {{ $fornecedor['nome']}}
    <br>
    Status: {{ $fornecedor['status']}} 
    <br>
    CNPJ: {{ $fornecedor['cnpj']}}
    <br>
    Telefone: {{ $fornecedor['ddd'] ?? ''}} {{ $fornecedor['telefone'] ?? ''}}
    <br>
    <hr>
    @empty
        Não existem fornecedores cadastrados!!!
@endforelse


