@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
               <a href="{{url('livros') }}">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( Request::is('*/edit'))
                        <form action = "{{ url('livros/update')}}/{{$livro->id}}" method = "post">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Livro:</label>
                                <input type="text" name= "autor" class="form-control" value="{{$livro->autor->nome}}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Genero:</label>
                                <input type="number_format" name = "genero" class="form-control"  value="{{$livro->genero}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Editora:</label>
                                <input type="text" name = "sexo" class="form-control" value="{{$livro->editora->codigo}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Titulo:</label>
                                <input type="text" name = "nacionalidade" class="form-control" value="{{$livro->titulo}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Titulo:</label>
                                <input type="text" name = "nacionalidade" class="form-control" value="{{$livro->ano_de_lancamento}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    @else

                    <form action = "{{ url('livros/add')}}" method = "post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Livro:</label>
                            <div class="form-group">
                            </div>

                                <input type="text" name= "autor" class="form-control" value="{{$autor->nome}}" >
                            </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Genero:</label>
                            <input type="number_format" name = "genero" class="form-control"  value="{{$livro->genero->nome}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Editora:</label>
                            <input type="text" name = "sexo" class="form-control" value="{{$livro->editora->codigo}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo:</label>
                            <input type="text" name = "nacionalidade" class="form-control" value="{{$livro->titulo}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo:</label>
                            <input type="text" name = "nacionalidade" class="form-control" value="{{$livro->ano_de_lancamento}}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
