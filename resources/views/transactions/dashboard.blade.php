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
              Sales
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
              Purchases 
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
  <div class="col-12 col-md-6">
    
    <!-- Orders -->
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col">
        
            <!-- Title -->
            <h4 class="card-header-title">
              Sales chart(months)
            </h4>

          </div>
        
         
        </div> <!-- / .row -->

      </div>
      <div class="card-body">
        
        <!-- Chart -->
        <div class="chart chart-appended">
          <canvas id="month" class="chart-canvas" ></canvas>
        </div>
        
      </div>
     
    </div>

  </div>
  <div class="col-12 col-md-6">
    
    <!-- Orders -->
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col">
        
            <!-- Title -->
            <h4 class="card-header-title">
              Sales chart(days)
            </h4>

          </div>
        
         
        </div> <!-- / .row -->

      </div>
      <div class="card-body">
        
        <!-- Chart -->
        <div class="chart chart-appended">
          <canvas id="day" class="chart-canvas" ></canvas>
        </div>
        
      </div>
     
    </div>

  </div>
  

</div>
<div class="row">
    
    <div class="col-12 col-lg-6 col-xl">
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
      <div class="col-12 col-lg-6 col-xl">
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
      <div class="col-12 col-lg-6 col-xl">
      <a href="{{route('user.create')}}" class="custom-card">
        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                
              
                
                <h4 class="card-title  text-muted mb-2">
                   New User
                  </h4>
             
    
              </div>
              <div class="col-auto">
            
                <!-- Icon -->
                <span class="h1 fe fe-user text-muted mb-0"></span>
    
              </div>
             
            </div> <!-- / .row -->
    
          </div>
        </div>
    
        </a>
      </div>
      <div class="col-12 col-lg-6 col-xl">
      <a href="{{route('suppliers.create')}}" class="custom-card">
        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                
              
                
                <h4 class="card-title  text-muted mb-2">
                   New Supplier
                  </h4>
             
    
              </div>
              <div class="col-auto">
            
                <!-- Icon -->
                <span class="h1 fe fe-truck text-muted mb-0"></span>
    
              </div>
             
            </div> <!-- / .row -->
    
          </div>
        </div>
    
        </a>
      </div>
      <div class="col-12 col-lg-6 col-xl">
      <a href="{{route('products.create')}}" class="custom-card">
        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                
              
                
                <h4 class="card-title  text-muted mb-2">
                   New Medicine
                  </h4>
             
    
              </div>
              <div class="col-auto">
            
                <!-- Icon -->
                <span class="h1 fe fe-plus text-muted mb-0"></span>
    
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
      var urlmonth = "{{url('dashboard/admin/monthChart')}}";
      var urlDay = "{{url('dashboard/admin/dayChart')}}";
      
    
        var months = new Array();
        var monthLabels = new Array();
        var daysArray=new Array();
      
        var daysLabels=new Array();



  var monthQ=      $.ajax({
 url: urlmonth,
 async: false,
 dataType: "json",
 type: "GET",
 success: function(result){
  $.each(result, function(k, v) {
  months.push(v);
    monthLabels.push(k);

  });
},
});

var applicants=      $.ajax({
 url: urlDay,
 async: false,
 dataType: "json",
 type: "GET",
 success: function(result){
  $.each(result, function(k, v) {
    daysArray.push(v);
    daysLabels.push(k);

  });
},
});


var myApps=      $.ajax({
 url: urlmonth,
 async: false,
 dataType: "json",
 type: "GET",
 success: function(result){
  $.each(result, function(k, v) {
    console.log(v);
    myAppsArray.push(v);
   

  });
},
});
new Chart('month', {
  
  type: 'bar',

  data: {
    labels: monthLabels,
    datasets: [{
    
	
      data: months,
    
    }]
  }
});
new Chart('day', {
  
  type: 'bar',

  data: {
    labels: daysLabels,
    datasets: [{
    
	
      data: daysArray,
    
    }]
  }
});


</script>
@endsection