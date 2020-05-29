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
                    <h6 class="header-pretitle">
                      Set price
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                      Create New medicine
                    </h1>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
       
            {!! Form::model($medicine,['method'=>'POST','action'=>['ProductController@setPrice',$medicine->id]]) !!}
                   
       
            <div class="form-group">
              {!!Form::label('selling_price','selling price :')!!}
              {!!Form::number('selling_price',null,['class'=>'form-control','required'])!!}
            </div>
              


              <!-- Divider -->
              <hr class="mt-4 mb-5">

              <!-- Project cover -->
              
             
              <div class="form-group">
        
                    {!!Form::submit('save',['class'=>'btn btn-block btn-primary'])!!}
           </div>

           {!! Form::close() !!}

          </div>
        </div> <!-- / .row -->
      </div>
    
@endsection
@section('scripts')
<script type="text/javascript">
 
</script>
@endsection
     