@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('livros/novo') }}">Novo livro</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Lista de livros</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Editora</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Ano de lancamento</th>
                            <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($livros as $u)

                            <tr>
                            <th scope="row">{{$u->id}}</th>
                            <td>{{$u->nome}}</td>
                            <td>{{$u->ano_de_nascimento}}</td>
                            <td>{{$u->sexo}}</td>
                            <td>{{$u->nacionalidade}}</td>
                            <td>
                                <a href="livros/{{( $u->id)}}/edit" class= "btn btn-info">Editar </button>
                            </td>
                            <td>
                                <form action ="livros/delete/{{$u->id}}" method= "post">
                                @csrf
                                @method('delete')
                                <button class= "btn btn-danger">Excluir </button>
                                </form>
                            </td>
                            </tr>


                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
