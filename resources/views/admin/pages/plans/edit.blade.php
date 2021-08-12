@extends('adminlte::page')

@section('title', "Editar o plano {$plan->name}")


@section('content_header')
    <h1> Editar o plano {{ $plan->name }} </h1>
@endsection



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
        <form action="{{ route('plans.update', $plan->url) }}" method="POST" class="form">
               @method('PUT')
               @csrf
                <div class="form-group">
                   <label> Nome: </label>
                   <input type="text" placeholder="Nome" class="form-control" name='name'             value="{{ $plan->name        }}">
               </div>
               <div class="form-group">
                   <label> Preço: </label>
                   <input type="text" placeholder="Preço" class="form-control" name='price'           value="{{ $plan->price       }}">
               </div>
               <div class="form-group">
                   <label> Descrição: </label>
                   <input type="text" placeholder="Descrição" class="form-control" name='description' value="{{ $plan->description }}">
               </div>                   
               
               <div class="form-group">
                   <button type="submit" class="btn btn-dark"> Editar </button>
               </div>

       </form>
   </div>
</div>
@endsection

