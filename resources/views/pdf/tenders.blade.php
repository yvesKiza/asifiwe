@extends('layouts.pdfHeader')
@section('title', 'TENDERS')

@section('content')
                <div class="col-md-6  text-md-right">

             

                <p>{{$type}} tenders</p>

                    {{-- <strong class="text-body">FROM</strong> 
                   {{from->format('M d,Y')}} <br>
                    <strong class="text-body">TO</strong> 
                   {{to->format('M d,Y')}}  <br> --}}
                    
                  
                  
                  <p class=" ">
                       TENDERS     @if($from) FROM {{$from->format('M d,Y')}} @endif <br>
                       
                       @if($to)    TO  {{$to->format('M d,Y')}} @endif
                         <br> 
                         
                       </p>
                       
                  <h6 class="text-uppercase ">
                      {{$tenders->count()}} TENDERS
                  </h6>

                  {{-- <p class="mb-4">
                   {{$tenders->count()}} TENDERS
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
                            <span class="h6">NAME</span>
                          </th>
                          <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6">STATUS</span>
                          </th>
                          <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6">DEADLINE</span>
                          </th>
                          <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6">CREATED AT</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach ($tenders as $tender)
                        <tr>
                          <td class="px-0">
                            {{$loop->iteration}}
                          </td>
                          <td class="px-0">
                            {{$tender->name}}
                          </td>
                          <td class="px-0 text-right">
                            {{\App\Enums\TenderStatus::getKey($tender->status)}}
                          </td>
                          <td class="px-0 text-right">
                            {{$tender->deadline->format('M d,Y')}}
                          </td>
                          <td class="px-0 text-right">
                            {{$tender->created_at->format('M d,Y')}}
                          </td>
                        </tr>
                       @endforeach
                        
                      </tbody>
                    </table>
                  </div>

                 
                </div>
              </div> <!-- / .row -->
         @endsection