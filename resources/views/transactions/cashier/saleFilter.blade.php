<div class="row justify-content-center">
    <div class="col-12">
      
      <!-- Header -->
      <div class="header mt-md-5">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col">
              
              <!-- Pretitle -->
              <h6 class="header-pretitle">
              My sales
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
              valueNames:  [ 'no', 'product','expiry_date','quantity','date' ],
            page: 10,
            pagination: true
          });	
        </script>
  
        </div>
    </div>
  </div>