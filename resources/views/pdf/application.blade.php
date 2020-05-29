@extends('layouts.pdfHeader')

@section('title', 'MY APPLICATIONS')

@section('content')
                <div class="col-md-6  text-md-right">

             
                
                    {{-- <strong class="text-body">FROM</strong> 
                   {{from->format('M d,Y')}} <br>
                    <strong class="text-body">to</strong> 
                   {{to->format('M d,Y')}}  <br> --}}
                    <p> {{$type}} applications
                  </p>

                  
                  <p class=" ">
                       APPLICATIONS APPLIED   @if($from) FROM {{$from->format('M d,Y')}} @endif <br>
                       
                       @if($to)    TO  {{$to->format('M d,Y')}} @endif
                         <br> 
                         
                         
                       </p>
                     
                     
                  <h6 class="text-uppercase ">
                      {{$applications->count()}} APPLICANTS
                  </h6>

                  {{-- <p class="mb-4">
               /    {{$tenders->count()}} TENDERS
                  </p> --}}
              
                </div>
              </div> <!-- / .row -->
              <div class="row">
                <div class="col-12">
                  
                  <!-- Table -->
                  <div class="table-responsive">
                    <table class="table my-4">
                      <thead>
                        <tr>
                          <th class="px-0 bg-transparent border-top-0">
                            <span class="h6">#</span>
                          </th>
                          <th class="px-0 bg-transparent border-top-0">
                            <span class="h6">COMPANY NAME</span>
                          </th>
                          <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6">ADDRESS</span>
                          </th>
                          <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6">EMAIL</span>
                          </th>
                          <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6">APPLIED AT</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach ($applications as $application)
                        <tr>
                                <td  class="px-0">{{$loop->iteration}}</td>
                             
                                <td class="px-0">{{$application->tender->owner->name }}</td>
                                <td class="px-0 text-right">{{$application->tender->name }}</td>
                                @if($application->status==0)
                                <td class="px-0 text-right"><span class="text-success">● </span>{{\App\Enums\TenderApplicationStatus::getKey($application->status)}}</td>
                                @elseif($application->status==1)
                                <td class="px-0 text-right"><span class="text-danger">● </span>{{\App\Enums\TenderApplicationStatus::getKey($application->status)}}</td>
                                @elseif($application->status==2)
                                <td class="px-0 text-right"><span class="text-warning">● </span>{{\App\Enums\TenderApplicationStatus::getKey($application->status)}}</td>
                                @endif
                                <td class="px-0 text-right"><time>{{$application->created_at->toDateString()}}</time></td>
                        </tr>
                       @endforeach
                        
                      </tbody>
                    </table>
                  </div>

                 
                </div>
              </div> <!-- / .row -->
         @endsection