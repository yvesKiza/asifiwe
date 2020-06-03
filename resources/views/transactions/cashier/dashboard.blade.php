@extends('layouts.navbar')
@section('css')

<link href="{{asset('css/theme-dark.min.css')}}" rel="stylesheet" id="stylesheetDark">
@endsection
@section('content')
<div class="header">
  <div class="container">

    @include('includes.errors')
    <!-- Body -->
    <div class="header-body">
      <div class="row align-items-end">
        <div class="col">
          
          <!-- Pretitle -->
        

          <!-- Title -->
          <h1 class="header-title">
            Dashboard
          </h1>

        </div>
       
      </div> <!-- / .row -->
    </div> <!-- / .header-body -->

  </div>
</div>
<div class="container">
<div class="row">
  
   <div class="col-12 col-lg-6 col-xl">
    
    <!-- Card -->
    <div class="card">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">

            <!-- Title -->
            <h6 class="card-title text-uppercase text-muted mb-2">
             My Sales
            </h6>
            
            <!-- Heading -->
            <!-- Heading -->
            <h4 class=" mb-2">
                All: {{$salesAll}}
               </h4>
               <h4 class=" mb-2">
               Today :  {{$salesToday}}
 
               </h4>
             <h4 class=" mb-2">
                This month: {{$salesMonth}}
                 
             </h4>

            <!-- Badge -->
         

          </div>
         
        </div> <!-- / .row -->

      </div>
    </div>

  </div>
 
  <div class="col-12 col-lg-6 col-xl">
    
    <!-- Card -->
    <div class="card">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">

            <!-- Title -->
            <h6 class="card-title text-uppercase text-muted mb-2">
             My Purchases 
            </h6>
            
            <!-- Heading -->
            <!-- Heading -->
            <h4 class=" mb-2">
                All: {{$purchasesAll}}
               </h4>
               <h4 class=" mb-2">
               Today : {{$purchasesToday}}
 
               </h4>
             <h4 class=" mb-2">
                This month: {{$purchasesMonth}}
                 
             </h4>

            <!-- Badge -->
         

          </div>
         
        </div> <!-- / .row -->

      </div>
    </div>

  </div>
  <div class="col-12 col-lg-6 col-xl">
    
    <!-- Card -->
    <div class="card">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">

            <!-- Title -->
            <h6 class="card-title text-uppercase text-muted mb-2">
              Stock 
            </h6>
            
            <!-- Heading -->
            <!-- Heading -->
            <h4 class=" mb-2">
                Stock value: {{$stock}}
               </h4>
               <h4 class=" mb-2">
               out of stock : {{$out}}
 
               </h4>
             <h4 class=" mb-2">
                expired : {{$removed}}
                 
             </h4>

            <!-- Badge -->
         

          </div>
         
        </div> <!-- / .row -->

      </div>
    </div>

  </div>
</div>


<div class="row">
    
    <div class="col-12 col-md-4">
    <a href="{{route('create.cart')}}" class="custom-card">
        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                
              
                
                <h4 class="card-title  text-muted mb-2">
                   New Sale
                  </h4>
             
    
              </div>
              <div class="col-auto">
            
                <!-- Icon -->
                <span class="h1 fe fe-shopping-cart text-muted mb-0"></span>
    
              </div>
             
            </div> <!-- / .row -->
    
          </div>
        </div>
    
        </a>
      </div>
      <div class="col-12 col-md-4">
      <a href="{{route('purchase.create')}}" class="custom-card">
        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                
              
                
                <h4 class="card-title  text-muted mb-2">
                   New Purchase
                  </h4>
             
    
              </div>
              <div class="col-auto">
            
                <!-- Icon -->
                <span class="h1 fe fe-briefcase text-muted mb-0"></span>
    
              </div>
             
            </div> <!-- / .row -->
    
          </div>
        </div>
    
        </a>
      </div>
      <div class="col-12 col-md-4">
        <a href="{{route('purchase.create')}}" class="custom-card">
          <!-- Card -->
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  
                
                  
                  <h4 class="card-title  text-muted mb-2">
                    Stock
                    </h4>
               
      
                </div>
                <div class="col-auto">
              
                  <!-- Icon -->
                  <span class="h1 fe fe-file text-muted mb-0"></span>
      
                </div>
               
              </div> <!-- / .row -->
      
            </div>
          </div>
      
          </a>
        </div>
      
     
     
   
</div>



</div>


@endsection
@section('scripts')

<script type="text/javascript">
  
</script>
@endsection