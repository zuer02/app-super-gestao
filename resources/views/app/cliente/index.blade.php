@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right: auto;">
                <table border=1 width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>   
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            
                            <td><a href=" {{ route('cliente.show', ['cliente' => $cliente->id ]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <!-- <button type="submit">Excluir</button>  -->
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href=" {{ route('cliente.edit', ['cliente' => $cliente->id ]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody> 
                </table>
                <!-- {{ $clientes->links() }} -->
                <!-- <br>
                {{ $clientes->count()}} Total de registros por página
                <br>
                {{ $clientes->total()}} Total de registros por consulta
                <br>
                {{ $clientes->firstItem()}} Número do primeiro registro da página
                <br>
                {{ $clientes->lastItem() }} Número do último registro da página -->
                Exibindo {{ $clientes->count()}} registros de {{ $clientes->total()}} ({{ $clientes->firstItem()}} a {{ $clientes->lastItem()}})           
            </div>
           
        </div>
    </div>
@endsection