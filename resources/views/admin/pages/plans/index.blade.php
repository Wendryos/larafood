@extends('adminlte::page')

@section('title', 'Planos')


@section('content_header')
    <h1> Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"> <i class="fas fa-plus"></i> </a></h1>
     <ol class="breadcrumb">
        <li class="breadcrumb-item">        <a href="{{ route('admin.index') }}">  Dashboard </a> </li>
        <li class="breadcrumb-item active"> <a href="{{ route('plans.index') }}">  Planos    </a> </li>
    </ol>
@stop



@section('content')
    <div class="card">
        <div class="card-header">
             <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filters" placeholder="Nome" class="form-control" value="{{ $filters['filters'] ?? '' }}">
                <button type="submit" class="btn btn-dark" style="margin-left: 15px;"> <i class="fas fa-search"></i> </button>
            </form>
        </div>
        <div class="card-body">
             <table class="table table-striped">
                 <thead>
                     <tr>
                         <th> Nome  </th>
                         <th> Valor </th>
                         <th> Ações </th>
                     </tr>  
                 </thead>
                 <tbody>
                     @foreach ($plans as $plan)
                         <tr>
                             <td>    {{ $plan->name }}  </td>
                             <td> R$ {{ number_format($plan->price, 2, '.',',') }} </td>
                             <td> 
                                 <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-dark">    <i class="far fa-eye"></i> </a> 
                                 <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-primary text-light"> <i class="fas fa-pencil-alt"></i> </a> 
                            </td>
                          
                         </tr>
                     @endforeach
                 </tbody>
            </table>
             <div class="card-footer">
               
                @isset($filters)
                    {{  $plans->appends($filters)->links() }}
                @else 
                    {{  $plans->links() }}
                @endisset

            </div>
            
        </div>
    </div>


@stop

