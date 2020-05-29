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
                      Edit Manufacturer
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                      Details
                    </h1>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
{!! Form::model($manufacturer,['method'=>'PATCH','action'=>['ManufacturerController@update',$manufacturer->id]]) !!}
                   
<div class="form-group">
  {!!Form::label('name','name :')!!}
  {!!Form::text('name',null,['class'=>'form-control','required'])!!}
</div>

<div class="form-group">
{!!Form::label('description','description:')!!}
{!!Form::text('description',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('contact','contact :')!!}
{!!Form::text('contact',null,['class'=>'form-control','required'])!!}
</div>
<div class="form-group">
{!!Form::label('address','Address :')!!}
{!!Form::text('address',null,['class'=>'form-control','required'])!!}
</div>
<div class="form-group">
{!!Form::label('website','Website :')!!}
{!!Form::text('website',null,['class'=>'form-control'])!!}
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