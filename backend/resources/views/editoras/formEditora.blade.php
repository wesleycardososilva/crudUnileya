@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
               <a href="{{url('editoras') }}">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( Request::is('*/edit'))
                        <form action = "{{ url('editoras/update')}}/{{$editora->id}}" method = "post">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Editora:</label>
                                <input type="text" name= "nome" class="form-control" value="{{$editora->nome}}" >
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                    @else

                    <form action = "{{ url('editoras/add')}}" method = "post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Editora:</label>
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
