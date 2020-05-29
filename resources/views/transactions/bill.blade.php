@extends('layouts.navbar')
@section('content')
    

<div class="container">
        <div class="row justify-content-center">
            
            
            <div class="col text-center mt-5 mb-5">
                bill
            </div>
                </div>
        <div class="row">
                <div class="mt-2 text-left">
                   
                      
                     
                  <h2 >Asifiwe store </h2>
               
                   
                 
                   
          
                  </div>
        </div>
        <div class="text-center">
            <h2 class="mt-5">
                bill: #{{$x->id}}
                </h2>
        </div>
        <div class="row">
                <div class="col text-left">
                   
                      
                     
                       
                 
                  <h4 class="mt-2">
                    Date: {{$x->created_at->format('d M Y , H:m')}}
                  </h4>
                  <h4 class="mt-2">
                    customer: {{$x->customer_name}}
                  </h4>
                  <h4 class="mt-2">
                    cashier :{{$x->user->name}}
                  </h4>
                </div>
                  
                 
        
                
              </div> 
      
                
        
         
        <div class="row">
            <div class="col-12">
              
              <!-- Table -->
              <div class="table-responsive">
                <table class="table my-4">
                  <thead>
                    <tr>
                      
                      <th class="px-0 bg-transparent border-top-0">
                        <span class="h5">product</span>
                      </th>
                      <th class="px-0 bg-transparent border-top-0 text-right">
                        <span class="h5">price</span>
                      </th>
                      <th class="px-0 bg-transparent border-top-0 text-right">
                        <span class="h5">Quantity</span>
                      </th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($x->products as $c)
                      <tr>
                        <td  class="px-0">{{$c->product->full_name}}</td>
                        <td class="px-0 text-right">
                            {{$c->selling_price}}
                         </td>
                         <td class="px-0 text-right">
                           {{$c->quantity}}
                         </td>
                    </tr>
                      @endforeach
                   
        
        
            
                    
                  </tbody>
                  
                </table>
                <div class="mt-2">
                 total : {{$total}}
                </div>
                
              </div>
            <a href="{{route('bill.pdf',$x)}}" class="mt-5 btn btn-primary">
                print 
            </a>
        
             
            </div>
          </div> <!-- / .row -->
          </div>
        </div>
    </div>
</div>
</div>
@endsection