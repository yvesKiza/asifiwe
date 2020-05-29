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
                      Edit medicine
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
           
{!! Form::model($medicine,['method'=>'PATCH','action'=>['ProductController@update',$medicine->id]]) !!}
                   
       
<div class="form-group">
  {!!Form::label('name','name :')!!}
  {!!Form::text('name',null,['class'=>'form-control','required'])!!}
</div>

<div class="form-group">
{!!Form::label('description','description :')!!}
{!!Form::text('description',null,['class'=>'form-control','required'])!!}
</div>
<div class="form-group">
{!!Form::label('quantity_per_pack','quantity per pack :')!!}
{!!Form::text('quantity_per_pack',null,['class'=>'form-control','required'])!!}
</div>

<div class="form-group">
{!!Form::label('type','Type')!!}
{!!Form::select('product_type_id', ['' => 'choose type'] + $types,null,['class'=>'form-control typeList','required'=>'required'])!!}
</div>
<div class="form-group">
{!!Form::label('manufacturer','manufacturer')!!}
{!!Form::select('manufacturer_id', ['' => 'choose manufacturer'] + $manufacturers,null,['class'=>'form-control memberList','required'=>'required'])!!}
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
$('.memberList').select2();
$('.typeList').select2();

</script>
@endsection