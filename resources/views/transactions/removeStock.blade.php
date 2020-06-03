@extends('layouts.navbar')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-6">
              @if(!$errors->isEmpty())
                <div class="mt-3">
                @include('includes.errors')
                </div>
              
              @endif
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h4 class="header-pretitle">
                      cart
                    </h4>

                    <!-- Title -->
                  

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
  
                   
            {!! Form::open(['method'=>'POST','action'=>'TransactionAdmin@remove']) !!}

    <div class="form-group">
        {!!Form::label('medicine','medicine :')!!}
        {!!Form::select('medicine_id', ['' => 'choose medicine'] + $medicines,null,['class'=>'form-control medicineList','required'=>'required'])!!}
    </div>
  
<div class="form-group">
    {!!Form::label('quantity','quantity :')!!}
    {!!Form::number('quantity',null,['class'=>'form-control quantity','required'])!!}
    </div>
    
<div class="form-group">
    {!!Form::label('reason','reason :')!!}
    {!!Form::text('reason',null,['class'=>'form-control quantity','required'])!!}
    </div>

              <!-- Project cover -->
              
             
            
        
             
                <div class="form-group">
        
                    {!!Form::submit('save',['class'=>'btn btn-block btn-primary'])!!}
           </div>

           {!! Form::close() !!}

          </div>
          </div>
    
        </div> <!-- / .row -->
      </div>
    
        
@endsection
@section('scripts')

<
@endsection
     