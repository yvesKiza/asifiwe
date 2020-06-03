 <!-- Header -->
 
 <div class="header mt-md-5">
 {{-- <a href="{{route('company.profile')}}" class="font-weight-bold font-size-sm text-decoration-none mb-3">
        <i class="fe fe-arrow-left mr-3"></i> PROFILE
      </a> --}}
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col">
               
              <!-- Pretitle -->
              <h6 class="header-pretitle">
                OVERVIEW
              </h6>

              <!-- Title -->
              <h1 class="header-title">
                SETTINGS
              </h1>

            </div>
          </div> <!-- / .row -->
          <div class="row align-items-center">
            <div class="col">
              
              <!-- Nav -->
              <ul class="nav nav-tabs nav-overflow header-tabs">
                
                <li class="nav-item">
                  <a href="{{route('user.editEmail')}}" class="nav-link">
                    EMAIL

                  </a>
                </li>
                <li class="nav-item">
                      <a href="{{route('user.editPassword')}}" class="nav-link">
                        PASSWORD
  
                      </a>
                    </li>
                
              </ul>

            </div>
          </div>
        </div>
      </div>