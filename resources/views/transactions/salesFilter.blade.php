@extends('layouts.navbar')
@section('css')
<style>

.pagination {

  display: -ms-flexbox;
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: 0.25rem;
}
  
.pagination li { 
    margin-left: 0.2rem;
    padding: 0.2rem 0.2rem;
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
 }



.pagination .disabled { display:none; }
.pagination .active { z-index: 1;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff; }
.active .page {  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
 }


</style>

@endsection

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
        <div class="col-12">
          
          <!-- Header -->
          <div class="header mt-md-5">
            <div class="header-body">
              <div class="row align-items-center">
                <div class="col">
                  
                  <!-- Pretitle -->
                  <h6 class="header-pretitle">
                    OVERVIEW
                  </h6>

                  <!-- Title -->
                  <h1 class="header-title">
                sales
                  </h1>

                </div>
                <div class="col-auto">
                  
                  <!-- Button -->
                <a href="{{route('create.cart')}}" class="btn btn-primary">
                    New sale
                  </a>
                  
                </div>
              </div> <!-- / .row -->
              <div class="row mt-5">
                <div class="col-8 col-lg-4 col-xl-3">
                  
                  <div class="card">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
      
                            <!-- Title -->
                            <h6 class="card-title text-uppercase text-muted mb-2">
                             Total sales
                            </h6>
                            
                            <!-- Heading -->
                            <span class="h2 mb-0">
                             {{$total}}
                            </span>
        
                            <!-- Badge -->
                         
        
                          </div>
                          <div class="col-auto">
                            
                            <!-- Icon -->
                            <span class="h2 fe fe-briefcase text-muted mb-0"></span>
        
                          </div>
                       
                      </div> <!-- / .row -->
      
                    </div>
                  </div>
                  

        
              </div>
            </div>
            <div class="row mt-5">
                 
                
                
                <form method="post" action="{{route('salesFilter')}}" class="form-inline">
                    @csrf
                  <div class="col-md-8 col-12 mt-3">
                     
                      <div class="input-group input-daterange">
                
                 
                          <input type="text" name="from_date" id="from_date" readonly class="form-control from {{ $errors->has('from_date') ? ' is-invalid' : '' }}" @if($from) value="{{$from->toDateString()}} @endif" />
                              <div class="input-group-addon pl-3 pr-3">to</div>
                          <input type="text"  name="to_date" id="to_date" readonly class="form-control to {{ $errors->has('to_date') ? ' is-invalid' : '' }}" @if($to)  value="{{$to->toDateString()}}" @endif />
                          </div>
                  </div>
                 
                  <div class="col-md-4 col-12 mt-3">
                   <button  type="submit" class="btn btn-info btn-sm" value="filter" name="submitButton">Filter</button>
                   <button   type ="submit" class="btn btn-warning btn-sm" value="refresh" name="submitButton">Refresh</button>
                   
                   
                  </div>
                </form>
                 </div>
          </div>

          <!-- Card -->
          <div class="card" id="paymentTable" >
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">

                  <!-- Search -->
                  <form class="row align-items-center">
                    <div class="col-auto pr-0">
                      <span class="fe fe-search text-muted"></span>
                    </div>
                    <div class="col-4">
                        <input type="search" class="form-control form-control-flush search" placeholder="Search">
                    </div>
                  </form>
                  
                </div>
              

              </div>
            </div>
            
                    <div class="table-responsive mt-5" data-toggle="lists" data-lists-values='["no", "name", "date"]'>
                            <table class="table  table-nowrap card-table">
                              <thead>
                                <tr>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="no">#</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="product">product</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="expiry_date">expiry date</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="price">price</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="quantity">quantity</a>
                                  </th>
                                 
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="recorder">recorded by</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="date">Added on</a>
                                  </th>
                               
                                  
                                </tr>
                              </thead>
                              <tbody class="list">

                                 
                                    @foreach ($stocks as $x)
                                <tr>

                                  <td  class="no">{{$x->id}}</td>
                             
                                  <td class="product">{{$x->product->full_name}}</td>
                                  <td class="expiry_date">{{$x->expiry_date}}</td>
                                  <td class="price">{{$x->selling_price}}</td>
                               
                                  <td class="quantity">{{$x->quantity}}</td>
                                 
                                  <td class="recorder">{{$x->bill->user->name}}</td>
                                  <td class="date"><time>{{$x->created_at->format('d M Y')}}</time></td>
                                
                                
                                 
                                       
                                            </tr>
                                                          
                                            @endforeach
                                              
                            </tbody>
                            <tfoot>
                                <tr>
                                   
                                            <td>
                                                    <nav aria-label="Page navigation example">
                                                            
                                              <ul class="pagination">
                                                  
                                              </ul>
                                                    </nav>
                                            </td>
                                          
                                </tr>
                            </tfoot>
                            </table>
                          </div>
            </div>
            </div>
        </div>
</div>
        </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

var userList = new List('paymentTable', { 
    valueNames:  [ 'no', 'product','expiry_date','quantity','supplier','recorder' ],
  page: 10,
  pagination: true
});	
$('.input-daterange').datepicker({
 todayBtn: 'linked',
 format: 'yyyy-mm-dd',
 autoclose: true
});
</script>
@endsection
