@if (count($errors)>0)
<div class="mt-3 col-4 col-lg-4 col-xl-5">

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ul>
    </div>
</div>
    
@endif

@if(Session::has('success'))
<div class="mt-3 col-4 col-lg-4 col-xl-5">
    <div class="alert alert-success">
                       {{ session('success')}}
      </div>
</div>
@endif
@if(Session::has('error'))
<div class="mt-3 col-4 col-lg-4 col-xl-5">
    <div class="alert alert-danger">
                       {{ session('error')}}
      </div>
</div>
@endif

