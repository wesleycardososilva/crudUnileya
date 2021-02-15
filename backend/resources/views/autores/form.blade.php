@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
               <a href="{{url('autores') }}">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( Request::is('*/edit'))
                        <form action = "{{ url('autores/update')}}/{{$autor->id}}" method = "post">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome:</label>
                                <input type="text" name= "nome" class="form-control" value="{{$autor->nome}}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ano de nascimento:</label>
                                <input type="number_format" name = "ano_de_nascimento" class="form-control"  value="{{$autor->ano_de_nascimento}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sexo:</label>
                                <input type="text" name = "sexo" class="form-control" value="{{$autor->sexo}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nacionalidade:</label>
                                <input type="text" name = "nacionalidade" class="form-control" value="{{$autor->nacionalidade}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    @else

                    <form action = "{{ url('autores/add')}}" method = "post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome:</label>
                            <input type="text" name= "nome" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ano de nascimento:</label>
                            <input type="number_format" name = "ano_de_nascimento" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sexo:</label>
                            <input type="text" name = "sexo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nacionalidade:</label>
                            <input type="text" name = "nacionalidade" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
