@extends('layouts.navbar')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-6">
             
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h4 class="header-pretitle">
                   Product
                    </h4>

              

                  </div>
                  
                </div> <!-- / .row -->
              </div>
            </div>
            <div class="col-12 col-xl-10">

                <!-- Card -->
                <div class="card">
                  <div class="card-body">
    
                    <!-- List group -->
                    <div class="list-group list-group-flush my-n3">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Names
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Time -->
                            <small class="text-muted" >
                             {{$x->name}} 
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                              description
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Time -->
                            <small class="text-muted" >
                              {{$x->description}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                           Type
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                              {{$x->type->name}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             manufacturer
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                                {{$x->manufacturer->name}}
                             
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Selling price
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                                {{$x->selling_price}}
                             
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                     
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                               purchases
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Link -->
                            <a href="#!" class="small">
                              {{$x->purchases->count()}}
                            </a>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                               sales
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Link -->
                            <a href="#!" class="small">
                              {{$x->sales->count()}}
                            </a>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                   
                    </div>
    
                  </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col">

                      <a href="{{route('products.edit',$x->id)}}" class="btn btn-primary">
                          edit
                          </a>

                      </div>
                      <div class="col">

                        <a href="{{route('price.set',$x->id)}}" class="btn btn-primary">
                          set price
                            </a>
  
                        </div>
                      <div class="col-auto">

                        <!-- Link -->
                        {!! Form::open(['method' => 'DELETE','action'=>['ProductController@destroy',$x->id], 'onsubmit' => 'return ConfirmDelete()']) !!}

                      
                      
                        {!!Form::submit('delete',['class'=>'btn btn-block btn-danger'])!!}
                      
                      {!! Form::close() !!}

                      </div>
                    </div> <!-- / .row -->
                  </div>
               
                </div>

              </div>
            </div>
            <div class="col-12 col-xl-10">
              <div class="ol-12 col-xl-8">
              price history
              </div>
            @if($x->priceHistory->count()>0)
            <div class="card" id="paymentTable" >
               
                
                        <div class="table-responsive mt-5" data-toggle="lists" data-lists-values='["No", "Date","patient"]'>
                                <table class="table  table-nowrap card-table">
                                  <thead>
                                    <tr>
                                      <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="No">#</a>
                                      </th>
                                      <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="Date">Date</a>
                                      </th>
                                      <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="Doctor">price</a>
                                      </th>
                                      <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="Doctor">user</a>
                                      </th>
                                   
                                    
                                     
                                      
                                      
                                     
                                     
                                      
                                    </tr>
                                  </thead>
                                  <tbody class="list">
    
                                     
                                        @foreach ($x->priceHistory->sortByDesc('created_at') as $c)
                                    <tr>
    
                                      <td  class="No">{{$loop->index+1}}</td>
                                      <td class="Date">{{$c->created_at->format('d M Y')}}</td>
                                 
                                      <td class="price">{{$c->price}}</td>
                                      <td class="user">{{$c->user->name}}</td>
                                       
                                   
                                   
                                 
                                      
                                      
                                    
                                    
                                     
                                                              
                                                @endforeach
                                                  
                                </tbody>
                                
                                </table>
                              </div>
                </div>
                @endif
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

function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }
</script>
@endsection