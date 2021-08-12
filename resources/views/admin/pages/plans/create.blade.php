@extends('adminlte::page')

@section('title', 'Cadastrar novo plano')


@section('content_header')
    <h1> Cadastrar novo plano </h1>
@stop



@section('content')
@if ($errors->any()) 
     <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <h6> <i class="fas fa-hand-point-right"></i> {{ $error }} </h6>
        <hr>
        @endforeach
    </div>
@endif


    <div class="card">
         <div class="card-body">
             <form action="{{ route('plans.store') }}" method="POST" class="form">
                    @method('POST')
                    @csrf
                     <div class="form-group">
                        <label> Nome: </label>
                        <input type="text" placeholder="Nome" class="form-control" name='name' value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label> Preço: </label>
                        <input type="text" placeholder="Preço" class="form-control" name='price' value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label> Descrição: </label>
                        <input type="text" placeholder="Descrição" class="form-control" name='description' value="{{ old('description') }}">
                    </div>                   
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark"> Cadastrar </button>
                    </div>

            </form>
        </div>
    </div>


@stop

