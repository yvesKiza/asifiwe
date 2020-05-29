

@csrf
<div class="modal fade" id="coverImage" tabindex="-1" role="dialog" aria-labelledby="coverImage" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="coverImage">UPLOAD COVER IMAGE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="dropzone " id="coverUpload"  >
         
         </div>
         <div class="alert alert-danger " style="display:none" id="cover"></div>
      </div>
      <div class="modal-footer">
        
        <small class="form-text text-muted">
          This photo will be shown to others publicly, so choose it carefully.
        </small>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="profileImage" tabindex="-1" role="dialog" aria-labelledby="profileImage" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="profileImage">UPLOAD LOGO IMAGE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="dropzone " id="profileUpload"  >
           
           </div>
           <div class="alert alert-danger " style="display:none" id="logoError"></div>
        </div>
        <div class="modal-footer">
          
          <small class="form-text text-muted">
            This photo will be shown to others publicly, so choose it carefully.
          </small>
        </div>
      </div>
    </div>
  </div>
<div class="header">

   
        <!-- Image -->
        <img src="{{ $user->cover ? asset('/images/cover/'.$user->cover): asset('/images/placeholder/cover.png' )}}" class="banner avatar-img" id="coverImg"  data-toggle="modal" data-target="#coverImage" alt="...">
        
        <div class="container">

          <!-- Body -->
          <div class="header-body mt-n5 mt-md-n6">
            <div class="row align-items-end">
              <div class="col-auto">
                
                <!-- Avatar -->
                <div class="avatar avatar-xxl   header-avatar-top">
                  <img src="{{ $user->avatar ? asset('/images/logo/'.$user->avatar): asset('/images/placeholder/logo.png' )}}" id ="logoImg" alt="..." class="avatar-img rounded border border-4 border-body " data-toggle="modal" data-target="#profileImage">
                </div>

              </div>
              <div class="col mb-3 ml-n3 ml-md-n2">
                
                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  INSTITUTION
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                 {{$user->name}}
                </h1>
                
  
                </div>
                <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">
                
                  <!-- Button -->
                  <a href="{{route('company.editGeneral')}}" class="btn btn-primary d-block d-md-inline-block">
                    EDIT PROFILE
                  </a>
  
                </div>
              </div>
              
            </div> <!-- / .row -->
           
          </div> <!-- / .header-body -->

        </div>
      </div>
     
      