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
  
                   
    {{ csrf_field() }}

    <div class="form-group">
        {!!Form::label('medicine','medicine :')!!}
        {!!Form::select('medicine_id', ['' => 'choose medicine'] + $medicines,null,['class'=>'form-control medicineList','required'=>'required'])!!}
    </div>
  
<div class="form-group">
    {!!Form::label('quantity','quantity :')!!}
    {!!Form::text('quantity',null,['class'=>'form-control quantity','required'])!!}
    </div>

              <!-- Project cover -->
              
             
              <div class="form-group">
        
               

           <button type="button" class="btn btn-primary" id="btn-save" value="add">add to cart
        </button>
              </div>
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
                         <div class="col_auto">
                          <button type="button" class="btn btn-danger delete-link" value="{{$x->id}}">delete</button>
                          </div>
                         
                        
                      
                    </div>
                    </li>
                    @endforeach
                </ul>  
                          
                         
                </div>
            </div>
            <a href="{{route('bring.checkout')}}" class="mt-5 btn btn-primary">
              checkout
            </a>
          </div>
    
        </div> <!-- / .row -->
      </div>
    
        
@endsection
@section('scripts')
<script type="text/javascript">
 $('.medicineList').select2();
 $(document).ready( function() { // Wait until document is fully parsed
   
     $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
      
        var formData = {
            medicine_id: $(".medicineList").val(),
            quantity: $(".quantity").val(),
        };
   
        $.ajax({
           
            type: 'POST',
            url:'{{route('ajax')}}',
           
            data: formData,
            dataType: 'json',
                         
                         success: function (data) {
                       
                            $('#aj .list-group').html(data.html);
                             
                         },
                         error: function (xhr, type) {
                             alert(xhr.responseText);
                         }
                     });
              
                  
        });
        $("#aj .list-group ").on("click", ".delete-link", function() {
        var link_id = $(this).val();
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
            id: link_id,
           
        };
        $.ajax({
            type: "POST",
            url: '{{route('deleteCart')}}',
            data: formData,
            dataType: 'json',
            success: function (data) {
                       
                       $('#aj .list-group').html(data.html);
                        
                    },
                    error: function (xhr, type) {
                        alert(xhr.responseText);
                    }
        });
    });
    
});
       
 

</script>
@endsection
     