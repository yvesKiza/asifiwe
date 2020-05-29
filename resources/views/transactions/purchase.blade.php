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
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                      New Purchase
                    </h6>

                    <!-- Title -->
                   

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
{!! Form::open(['method'=>'POST','action'=>'TransactionController@purchase']) !!}
                   
              
              <div class="form-group">
                    {!!Form::label('medicine','medicine :')!!}
                    {!!Form::select('medicine_id', ['' => 'choose medicine'] + $medicines,null,['class'=>'form-control medicineList','required'=>'required'])!!}
              </div>
              
              

        
<div class="form-group">
  {!!Form::label('supplier','supplier')!!}
  {!!Form::select('supplier_id', ['' => 'choose supplier'] + $suppliers,null,['class'=>'form-control supplierList','required'=>'required'])!!}
  </div>
  
<div class="form-group">
    {!!Form::label('expiry date','expiry date :')!!}
    {!!Form::text('expiry_date',null,['class'=>'form-control expiry_date','required'])!!}
</div>
<div class="form-group">
{!!Form::label('quantity','quantity :')!!}
{!!Form::text('quantity',null,['class'=>'form-control','required'])!!}
</div>
  <div class="form-group">
    {!!Form::label('buying_price','buying price :')!!}
    {!!Form::number('buying_price',null,['class'=>'form-control','required'])!!}
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
  $('.medicineList').select2();
  $('.supplierList').select2();
  $(".manufacture_date").flatpickr({
    
    dateFormat: "Y-m-d",
    
     maxDate: "today",
   
    
});
$(".expiry_date").flatpickr({
    
    dateFormat: "Y-m-d",
    
     minDate: "today",
   
    
});
  
</script>
@endsection
     