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
                    Supplier
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
                             {{$supplier->name}} 
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                              contact
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Time -->
                            <small class="text-muted" >
                              {{$supplier->supplier_contact}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                              Company name
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                              {{$supplier->company_name}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             company contact
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                                {{$supplier->company_contact}}
                             
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
                              {{$supplier->products->count()}}
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

                      <a href="{{route('suppliers.edit',$supplier->id)}}" class="btn btn-primary">
                          edit
                          </a>

                      </div>
                      <div class="col-auto">

                        <!-- Link -->
                        {!! Form::open(['method' => 'DELETE','action'=>['SupplierController@destroy',$supplier->id], 'onsubmit' => 'return ConfirmDelete()']) !!}

                      
                      
                        {!!Form::submit('delete',['class'=>'btn btn-block btn-danger'])!!}
                      
                      {!! Form::close() !!}

                      </div>
                    </div> <!-- / .row -->
                  </div>
               
                </div>

              </div>
            </div>

                <!-- Weekly Hours -->
             
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