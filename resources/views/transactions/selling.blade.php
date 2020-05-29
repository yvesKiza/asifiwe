@extends('layouts.navbar')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 ">
              @if(!$errors->isEmpty())
                <div class="mt-3">
                @include('includes.errors')
                </div>
              
              @endif
              <a href="{{route('create.cart')}}"  class="btn btn-default" >
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true">
                   return to cart
                </span>
            </a>
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h3 class="header-pretitle">
                     Checkout
                    </h3>

                    <!-- Title -->
                   

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
{!! Form::open(['method'=>'POST','action'=>'TransactionController@checkout']) !!}
                   
              
  <div class="form-group">
    {!!Form::label('client_name','Client name :')!!}
    {!!Form::text('client_name',null,['class'=>'form-control manufacture_date','required'])!!}
</div>
<div class="form-group">
    {!!Form::label('cart','cart :')!!}

    <div class="row">
        <div class="" id="aj">
            <ul class="list-group">
                @foreach ($products as $x) 
                <li class="list-group-item">
                <div class="row">
                    <div class="col-auto">
                       {{$x->product->full_name}}
                    </div>
                    <div class="col_auto">
                        {{$x->quantity}} Qty * {{$x->product->selling_price}}
                     </div>
                     
                    
                  
                </div>
                </li>
                @endforeach
            </ul>  
            <div class="mt-5">
                total : {{$total}}
            </div> 
                 
        </div>
        

    </div>


              <!-- Divider -->
              <hr class="mt-4 mb-5">

              <!-- Project cover -->
              
             
              <div class="form-group">
        
                    {!!Form::submit('Done',['class'=>'btn btn-block btn-primary'])!!}
           </div>

           {!! Form::close() !!}

          </div>
        </div> <!-- / .row -->
      </div>
    

@endsection
     