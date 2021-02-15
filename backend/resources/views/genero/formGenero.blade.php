@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
               <a href="{{url('generos') }}">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( Request::is('*/edit'))
                        <form action = "{{ url('generos/update')}}/{{$genero->id}}" method = "post">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Genero:</label>
                                <input type="text" name= "nome" class="form-control" value="{{$genero->nome}}" >
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                    @else

                    <form action = "{{ url('generos/add')}}" method = "post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Genero:</label>
                            <input type="text" name= "nome" class="form-control"  >
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
