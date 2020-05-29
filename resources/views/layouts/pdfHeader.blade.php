<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDFHEADER</title>
	<style >
		*{
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;

}

body{
	margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
table {
    border-collapse: collapse;
}
.table {
  width: 100%;
    margin-bottom: 1.5rem;
    color: #12263f;
}

.text-success {
    color: #00d97e!important
}
.text-warning {
    color: #f6c343!important
}
.text-danger {
    color: #e63757!important
}
.table th,
.table td {
  
    padding: .9375rem;
    vertical-align: top;
    border-top: 1px solid #edf2f9;
}

.table thead th {
  background-color: #f9fbfd;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: .08em;
    color: #95aac9;
    border-bottom-width: 1px;
    vertical-align: bottom;
    border-bottom: 2px solid #edf2f9;
    
    font-size: .8125rem;
}
.h6, h6 {
    font-size: .625rem;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: 1.125rem;
    font-weight: 500;
    line-height: 1.1;
}

.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table .thead-light th {
  color:rgb(202, 80, 73);
  background-color: #fff;
  border-color: #dee2e6;
}
.col-md-5 ,.col-md-7,.col-md-9,.col-md-3,.col-12{
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}
.card-body {
    flex: 1 1 auto;
    padding: 1.5rem;
}
.p-5 {
    padding: 2.25rem!important;
}

.col {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%;
}
.text-center {
    text-align: center!important;
}
.card {
    margin-bottom: 1.5rem;
    border-color: #edf2f9;
    box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03);
}
.col-md-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
     text-align: right;
  }
  .col-md-9 {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%;
  }
  .mb-2, .my-2 {
    margin-bottom: .375rem!important;
}
.text-muted {
    color: #95aac9!important;
}
  .col-md-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
  }
  .img-fluid, .img-thumbnail {
    max-width: 100%;
    height: auto;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}
.mt-5, .my-5 {
    margin-top: 2.25rem!important;
}
hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid #e3ebf6;
}
hr {
    box-sizing: content-box;
    height: 0;
    overflow: visible;
}
.mb-6, .my-6 {
    margin-bottom: 4.5rem!important;
}
.text-uppercase {
    text-transform: uppercase!important;
}
.text-body {
    color: #12263f!important;
}
.text-md-right {
    text-align: right!important;
}
.pr-0, .px-0 {
    padding-right: 0!important;
}
.border-top-0 {
    border-top: 0!important;
}
.bg-transparent {
    background-color: transparent!important;
}
.col-6 {
    flex: 0 0 50%;
    max-width: 50%
}
.text-right {
    text-align: right!important;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
}
.align-items-center {
  -ms-flex-align: center !important;
  align-items: center !important;
}
  
  .col-md-7 {
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
  }
  .col-md-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }
  
.container-fluid {
    width: 100%;
    padding-right: 12px;
    padding-left: 12px;
    margin-right: auto;
    margin-left: auto;
}
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -12px;
    margin-left: -12px;
}


.col-12 {
    flex: 0 0 100%;
    max-width: 100%;
}
.justify-content-center {
  -ms-flex-pack: center !important;
  justify-content: center !important;
}

.mt-3,
.my-3 {
  margin-top: 1rem !important;
}
@page {
	header: page-header;
	footer: page-footer;
}
	</style>
</head>
<body>
        <htmlpagefooter name="page-footer">
              PAGE {PAGENO} of {nbpg}
            </htmlpagefooter>
            PRINTED ON {{$date->format('M d,Y')}}
	<div class="container">
        <div class="row ">
           
            
                <div class="col text-right">

                  <!-- Badge -->
                  <h6 class="text-muted">
                  
                  </h6>

                </div>
              </div> <!-- / .row -->
              <div class="row">
                <div class="col text-center">
                   
                      @if ($user->avatar)
                          
                     
                        <img src="{{public_path('/images/logo').'/'.$user->avatar}}" alt="..." class="img-fluid mb-4" style="max-width: 5rem;">
                        @endif
                  <h2 class="mb-6">
                   @yield('title')
                  </h2>

                  <!-- Text -->
                 

                </div>
              </div> <!-- / .row -->
              <div class="row">
                <div class="col-md-6">
                  
               

                  <p class=" mb-4">
                  <strong class="text-body">{{$user->name}}</strong> <br>
                   {{$user->website}} <br>
                    {{$user->address}} <br>
                   {{$user->user->email}}
                  </p>

                 

                </div>
                @yield('content')

            </div>
        
   
        </body>
        </html>
