<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rvip ltd</title>
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
                    Password reset
              </h1>
              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" >{{ __('E-Mail Address') }}</label>

                           
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn  btn-primary mb-3">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                        </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
