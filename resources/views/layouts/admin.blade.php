<html lang="en">
<head><meta http-equiv="content-type" content="text/html;charset=utf-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="{{asset('css/all.css')}}" rel="stylesheet">
     
   

    @yield('css')
    

    <title>@ADMINHOME</title>
 </head>
  <body >

   
    
      <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
        <div class="container-fluid">

          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Brand -->
          <a class="navbar-brand" href="/">
            <img src="{{asset('img/logo.svg')}}" class="navbar-brand-img 
            mx-auto" alt="...">
          </a>

          <!-- User (xs) -->
          <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">
        
              <!-- Toggle -->
              <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                  <img src="{{asset('img/avatars/profiles/avatar-1.jpg')}}" class="avatar-img rounded-circle" alt="...">
                </div>
              </a>

              <!-- Menu -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                <a href="profile-posts.html" class="dropdown-item">PROFILE</a>
                <a href="settings.html" class="dropdown-item">SETTINGS</a>
                <hr class="dropdown-divider">
                <a href="sign-in.html" class="dropdown-item">Logout</a>
              </div>

            </div>

          </div>

          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
              <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fe fe-search"></span>
                  </div>
                </div>
              </div>
            </form>
      
            <!-- Navigation -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.index')}}" >
                  <i class="fe fe-home"></i> DASHBOARD
                </a>
               
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                  <i class="fe fe-file"></i> TENDERS
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.application')}}">
                      <i class="fe fe-file"></i> MY APPLICATIONS
                    </a>
                
              <li class="nav-item d-md-none">
                <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                 <span class="fe fe-bell"></span> NOTIFICATIONS
                </a>
              </li>
            </ul>

            
            

        </div>
      </nav>
    
    

    <!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">

      
        <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
          <div class="container-fluid">

            <!-- Form -->
            <form class="form-inline mr-4 d-none d-md-flex">
              <div class="input-group input-group-flush input-group-merge" data-toggle="lists" data-lists-values="[&quot;name&quot;]">

                <!-- Input -->
                <input type="search" class="form-control form-control-prepended dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fe fe-search"></i>
                  </div>
                </div>


              </div>
            </form>

            <!-- User -->
            <div class="navbar-user">
      
              <!-- Dropdown -->
              <div class="dropdown mr-4 d-none d-md-flex">
        
                <!-- Toggle -->
                <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon active">
                    <i class="fe fe-bell"></i>
                  </span>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col">
                
                        <!-- Title -->
                        <h5 class="card-header-title">
                          NOTIFICATIONS
                        </h5>

                      </div>
                      <div class="col-auto">
                
                        <!-- Link -->
                        <a href="#!" class="small">
                          VIEW ALL
                        </a>

                      </div>
                    </div> <!-- / .row -->
                  </div> <!-- / .card-header -->
                  <div class="card-body">

                    <!-- List group -->
                    <div class="list-group list-group-flush my-n3">
                      <a class="list-group-item px-0" href="#!">
              
                        <div class="row">
                          <div class="col-auto">
                    
                            <!-- Avatar -->
                            <div class="avatar avatar-sm">
                              <img src="{{asset('img/avatars/profiles/avatar-1.jpg')}}" alt="..." class="avatar-img rounded-circle">
                            </div>

                          </div>
                          <div class="col ml-n2">
                    
                            <!-- Content -->
                            <div class="small text-muted">
                              <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                            </div>

                          </div>
                          <div class="col-auto">

                            <small class="text-muted">
                              2m
                            </small>
                    
                          </div>
                        </div> <!-- / .row -->

                      </a>

                     
                    </div>
            
                  </div>
                </div> <!-- / .dropdown-menu -->

              </div>

              <!-- Dropdown -->
              <div class="dropdown">
        
                <!-- Toggle -->
                <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{asset('img/avatars/profiles/avatar-1.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="profile-posts.html" class="dropdown-item">PROFILE</a>
                  <a href="settings.html" class="dropdown-item">SETTINGS</a>
                  <hr class="dropdown-divider">
                  <a href="sign-in.html" class="dropdown-item">Logout</a>
                </div>

              </div>

            </div>
  
          </div>
        </nav>
    
         
         
     
            @yield('content')
     </div>
     <script src="{{asset('js/all.js')}}"></script>
     @yield('scripts')
</body>
</html>

  

  