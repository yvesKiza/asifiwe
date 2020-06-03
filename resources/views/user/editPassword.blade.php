@extends('layouts.navbar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
          
            @include('includes.profileEdit')
          
        @include('includes.errors')
        
      
        <!-- Form -->
        {!! Form::open(['method'=>'PATCH','action'=>['TransactionController@updatePassword'],'class'=>'mb-4']) !!}
        
        <div class="row">
                <div class="col-12 col-md-6">
                  
                  <!-- Last name -->
                  <div class="form-group row">
                        <label for="current" class="col-sm-5 col-form-label">CURRENT PASSWORD</label>
                        <div class="col-sm-7">
                          <input type="password" name="current" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                            <label for="new" class="col-sm-5 col-form-label">NEW PASSWORD</label>
                            <div class="col-sm-7">
                              <input type="password" name="new" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                                <label for="new" class="col-sm-5 col-form-label">CONFIRM PASSWORD</label>
                                <div class="col-sm-7">
                                  <input type="password" name="password_confirmation" class="form-control">
                                </div>
                              </div>
                      
            
          
            {!!Form::submit('save changes',['class'=>'btn btn-primary'])!!}
              <!-- Submit -->
             
         
          {!! Form::close() !!}
        
    </div> <!-- / .row -->
    </div>
      </div>
    </div>
        

    
    
  </div>
  @endsection