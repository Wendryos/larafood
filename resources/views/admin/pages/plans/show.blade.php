@extends('adminlte::page')

@section('title', "Detalhes do plano - {$plan->name}")


@section('content_header')
    <h1> Detalhes do plano - <b> {{ $plan->name }} </b> </h1>
@endsection



@section('content')
    <div class="card">
         <div class="card-body">
             <ul>
                 <li> 
                    <strong> Nome: </strong> {{ $plan->name }}
                </li>
                <li> 
                    <strong> URL: </strong> {{ $plan->url }}
                </li>
                <li> 
                    <strong> Preço: </strong> R$ {{ number_format($plan->price, 2, '.', ',') }}
                </li>
                <li> 
                    <strong> Descrição: </strong> {{ $plan->description }}
               </li>
            </ul>
        </div>
        <div class="card-footer d-flex mx-auto">
            <a class="btn btn-dark"   href="{{ route('plans.index') }}" style="margin-right: 10px;">   <i class="fas fa-long-arrow-alt-left"></i> </a> 
             <form action="{{ route('plans.delete', $plan->url) }}" method="POST" class="form-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
            </form> 
        </div>
    </div>


@endsection

