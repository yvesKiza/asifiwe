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
                      New User
                    </h6>

                    <!-- Title -->
                  

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
{!! Form::open(['method'=>'POST','action'=>'UserController@addUser']) !!}
                   
              
              <div class="form-group">
                    {!!Form::label('name','name :')!!}
                    {!!Form::text('name',null,['class'=>'form-control','required'])!!}
              </div>
              
              <div class="form-group">
                {!!Form::label('email','email :')!!}
                {!!Form::text('email',null,['class'=>'form-control','required'])!!}
          </div>
          <div class="form-group">
            {!!Form::label('address','address:')!!}
            {!!Form::text('address',null,['class'=>'form-control','required'])!!}
      </div>
      <div class="form-group">
        {!!Form::label('CNIC','CNIC :')!!}
        {!!Form::text('CNIC',null,['class'=>'form-control','required'])!!}
  </div>
                    <div class="form-group">
                        {!!Form::label('salary','salary :')!!}
                        {!!Form::number('salary',null,['class'=>'form-control','required'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('gender','gender :')!!}
                        {!!Form::select('gender', [''=>'select gender','1' => 'Male', '2' => 'Female'],'',['class'=>'form-control'])!!}

                  </div>
                  <div class="form-group">
                    {!!Form::label('role','role :')!!}
                    {!!Form::select('role', [''=>'select role','admin' => 'admin', 'cashier' => 'cashier'],'',['class'=>'form-control'])!!}

              </div>
              <div class="form-group">
                {!!Form::label('password','password :')!!}
                {!!Form::password('password',null,['class'=>'form-control','required'])!!}

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
     