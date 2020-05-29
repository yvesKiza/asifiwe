@extends('layouts.pdfHeader')
@php
    $name=$tender->name;
@endphp
@section('title', 'applicants for '. $name)

@section('content')
                <div class="col-md-6  text-md-right">

                @if(  empty($from))

                  <p >
                 ALL APPLICANTS <br>
                    {{-- <strong class="text-body">FROM</strong> 
                   {{from->format('M d,Y')}} <br>
                    <strong class="text-body">to</strong> 
                   {{to->format('M d,Y')}}  <br> --}}
                    
                  </p>
                  @else
                  <p class=" ">
                       APPLICANTS APPLIED FROM {{$from->format('M d,Y')}} <br>
                       
                         TO  {{$to->format('M d,Y')}}
                         <br> 
                         
                       </p>
                       @endif  
                  <h6 class="text-uppercase ">
                      {{$applicants->count()}} APPLICANTS
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
                            @foreach ($applicants as $applicant)
                        <tr>
                                <td  class="px-0">{{$loop->iteration}}</td>
                                                 
                                <td class="px-0">{{$applicant->applicant->name}}</td>
                                <td class="px-0 text-right">{{$applicant->applicant->address}}</td>
                                <td class="px-0 text-right">{{$applicant->applicant->user->email}}</td>
                          <td class="px-0 text-right">
                            {{$applicant->created_at->format('M d,Y')}}
                          </td>
                        </tr>
                       @endforeach
                        
                      </tbody>
                    </table>
                  </div>

                 
                </div>
              </div> <!-- / .row -->
         @endsection