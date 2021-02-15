@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('generos/novo') }}">Novo genero</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Lista de generos</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo de genero</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($generos as $u)

                            <tr>
                            <th scope="row">{{$u->id}}</th>
                            <td>{{$u->nome}}</td>
                            <td>
                                <a href="genero/{{( $u->id)}}/edit" class= "btn btn-info">Editar </button>
                            </td>
                            <td>
                            <form action ="genero/delete/{{$u->id}}" method= "post">
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
