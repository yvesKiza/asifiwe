
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
