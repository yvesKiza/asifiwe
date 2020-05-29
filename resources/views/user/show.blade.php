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
                   User
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
                              address
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Time -->
                            <small class="text-muted" >
                              {{$x->address}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                              CNIC
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                              {{$x->CNIC}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                           Gender
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                               @if($x->gender==1)
                               Male
                               @else
                               Female
                               @endif
                             
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                     
                  
                   
                    </div>
    
                  </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                      
                      <div class="col-auto">

                        <!-- Link -->
                        {!! Form::open(['method' => 'POST','action'=>['UserController@deleteUser',$x->id], 'onsubmit' => 'return ConfirmDelete()']) !!}

                      
                      
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