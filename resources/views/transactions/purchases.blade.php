@extends('layouts.navbar')
@section('css')

<link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
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
  <div class="row">
  <div class="mt-5 float-right " style="width:20rem">
          
    <div id="reportrange" class="form-control" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fe fe-calendar"></i>&nbsp;
    <span></span> <i class="fe fe-chevron-down"></i>
    </div>
     </div>
     <div class="float-left mt-5 pl-5">
      <form action="{{route('purchase.pdf')}}" method="get" id="form">
        <input type="hidden" name="start" id="start" value="">
        <input type="hidden" name="end" id="end" value="">
        <button class="btn btn-primary"  id="print" type="submit">
          Print
        </button>
      </form>
    </div>
  </div>
    

   <div class="jqueryContent">
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
                  Purchases
                  </h1>

                </div>
                <div class="col-auto">
                  
                  <!-- Button -->
                <a href="{{route('purchase.create')}}" class="btn btn-primary">
                    New Purchase
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
                             Total purchases
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
                                    <a href="#" class="text-muted sort" data-sort="supplier">supplier</a>
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
                                  <td class="price">{{$x->buying_price}}</td>
                               
                                  <td class="quantity">{{$x->quantity}}</td>
                                  <td class="supplier">{{$x->supplier->name}}</td>
                                  <td class="recorder">{{$x->user->name}}</td>
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
            <script type="text/javascript">

              var userList = new List('paymentTable', { 
                  valueNames:  [ 'no', 'product','expiry_date','quantity','supplier','recorder' ],
                page: 10,
                pagination: true
              });	
             
          
      
  });
              
              </script>
            </div>
        </div>
</div>
        </div>


@endsection
@section('scripts')
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>
<script type="text/javascript">

var startDateData;
var endDateData;



$(function() {

var start = moment().startOf('month');
var end =moment().endOf('month');

function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    $('#start ').val(start.format('YYYY-MM-DD'));
    $('#end ').val(end.format('YYYY-MM-DD'));
}

$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Today': [moment(), moment()],
       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cb);

cb(start, end);

});
$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
 
 startDateData=picker.startDate.format('YYYY-MM-DD');
 endDateData=picker.endDate.format('YYYY-MM-DD');
 $('#start ').val(startDateData);
    $('#end ').val(endDateData);
 getData();
});

function getData(){
 $.ajax({
                         type: 'GET',
                         url: '{{route('purchaseFilter')}}',
                         data: {
                          
                           "start": startDateData,
                           "end":endDateData,
                           
                           },
                       
                         dataType: 'json',
                        
                         
                         
                         success: function (data) {
                           
                            

                        
                             $('.jqueryContent').html(data.html);
                             
                         },
                         error: function (xhr, type) {
                             alert(alert(xhr.responseText));
                         },
                        
                     });
}



</script>
@endsection
