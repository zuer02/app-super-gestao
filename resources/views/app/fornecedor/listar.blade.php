@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right: auto;">
                <table border=1 width="100%">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Site</td>
                            <td>UF</td>
                            <td>Email</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>   
                    <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                            <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody> 
                </table>
                {{ $fornecedores->appends($request)->links() }}
                <!-- <br>
                {{ $fornecedores->count()}} Total de registros por página
                <br>
                {{ $fornecedores->total()}} Total de registros por consulta
                <br>
                {{ $fornecedores->firstItem()}} Número do primeiro registro da página
                <br>
                {{ $fornecedores->lastItem() }} Número do último registro da página -->
                Exibindo {{ $fornecedores->count()}} registros de {{ $fornecedores->total()}} ({{ $fornecedores->firstItem()}} a {{ $fornecedores->lastItem()}})           
            </div>
        </div>
    </div>
@endsection