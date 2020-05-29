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
                Bills
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
                       
                       
                      </div> <!-- / .row -->
      
                    </div>
                  </div>

        
              </div>
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
                                    <a href="#" class="text-muted sort" data-sort="customer">customer</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="expiry_date">cashier</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="expiry_date">date</a>
                                  </th>
                               
                                  
                                </tr>
                              </thead>
                              <tbody class="list">

                                 
                                    @foreach ($stocks as $x)
                                <tr>

                                  <td  class="no">{{$x->id}}</td>
                             
                                  <td class="customer">{{$x->customer_name}}</td>
                                  <td class="cashier">{{$x->user->name}}</td>
                                  
                               
                                  <td class="date">{{$x->created_at->format('D M Y')}}</td>
                                  <td class="text-right">
                                    <div class="dropdown">
                                      <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right">
                                      <a href="{{route('bill.show',$x->id)}}" class="dropdown-item">
                                         show
                                        </a>
                                       
                                      </div>
                                    </div>
                                </tr>
                                  
                                
                                
                                 
                                       
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
    valueNames:  [ 'no', 'product','expiry_date','quantity' ],
  page: 10,
  pagination: true
});	

</script>
@endsection
