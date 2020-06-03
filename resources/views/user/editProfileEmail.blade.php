@extends('layouts.navbar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
          
            @include('includes.profileEdit')
          
        

       
            @include('includes.errors')
        <!-- Form -->
        {!! Form::model($user,['method'=>'PATCH','action'=>['TransactionController@updateEmail'],'class'=>'mb-4']) !!}
        

        <div class="row">
                <div class="col-8">
                  
                  <!-- Last name -->
                  <div class="form-group">
    
                    <!-- Label -->
                    <label>
                    EMAIL ADDRESS
                    </label>
    
                    <!-- Input -->
                    {!!Form::text('email',null,['class'=>'form-control'])!!}
    
                  </div>
    
                </div>
                </div>
          <div class="row">
            <div class="col-8">
              
              <!-- First name -->
              <div class="form-group">

                <!-- Label -->
                <label>
                CURRENT  PASSWORD
                </label>

                <!-- Input -->
                <input type="password" name="password" class="form-control" />
              

              </div>

            </div>
          </div>
            
            
          
            {!!Form::submit('save changes',['class'=>'btn btn-primary'])!!}
              <!-- Submit -->
             
         
          {!! Form::close() !!}
        
    </div> <!-- / .row -->
    </div>
        
  </div>
  @endsection