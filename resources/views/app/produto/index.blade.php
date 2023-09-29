@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right: auto;">
                <table border=1 width="100%">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Descrição</td>
                            <td>Peso</td>
                            <td>Unidade ID</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>   
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td><a href=" {{ route('produto.show', ['produto' => $produto->id ]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <!-- <button type="submit">Excluir</button>  -->
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href=" {{ route('produto.edit', ['produto' => $produto->id ]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody> 
                </table>
                {{ $produtos->appends($request)->links() }}
                <!-- <br>
                {{ $produtos->count()}} Total de registros por página
                <br>
                {{ $produtos->total()}} Total de registros por consulta
                <br>
                {{ $produtos->firstItem()}} Número do primeiro registro da página
                <br>
                {{ $produtos->lastItem() }} Número do último registro da página -->
                Exibindo {{ $produtos->count()}} registros de {{ $produtos->total()}} ({{ $produtos->firstItem()}} a {{ $produtos->lastItem()}})           
            </div>
        </div>
    </div>
@endsection