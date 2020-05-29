<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>asifiwe</title>
    <link rel="shortcut icon" href="{{asset('/images/settings/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('/images/settings/favicon.ico')}}" type="image/x-icon"> 
    <link href="{{asset('css/front.css')}}" rel="stylesheet" id="stylesheetLight">
    <link href="{{asset('css/all.css')}}" rel="stylesheet" id="stylesheetLight">
   
    <style>
        body{
        background:white;
        }
        </style>
</head>
<body >
       
 <div class="d-flex align-items-center bg-auth " >
   
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">
          
          <!-- Heading -->
          <h1 class="display-4 text-center mb-5">
            Sign in
          </h1>
          
        
          
          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label>Email Address</label>

              <!-- Input -->
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="row">
                <div class="col">
                      
                  <!-- Label -->
                  <label>Password</label>
                  

                </div>
                <div class="col-auto">
                  
                  <!-- Help text -->
               
                  @if (Route::has('password.request'))
                  <a class="form-text small text-muted" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif

                </div>
              </div> <!-- / .row -->

            

                <!-- Input -->
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <!-- Icon -->
                

           
            </div>
            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </div>
              </div>
          </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-lg btn-block btn-primary mb-3">
              Sign in
            </button>

            <!-- Link -->
           
          </form>

        </div>
      </div>
    </div> 
 </div>
    
</body>
</html>