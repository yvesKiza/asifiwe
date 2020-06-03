<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asifiwe Store</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    
    @yield('css')
    <link href="{{asset('css/all.css')}}" rel="stylesheet" id="stylesheetLight">
       
       
        
    </head>
    <body style="display:block;">
            <nav class="navbar navbar-expand-lg  navbar-light " id="topnav">
                    <div class="container">
            
                      
                      <button class="navbar-toggler mr-auto collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
            
                      
                      {{-- <a class="navbar-brand mr-auto" href="index-2.html">
                            <img src="{{asset('img/logo.svg')}}" class="navbar-brand-img 
                            mx-auto" alt="...">
                      </a> --}}
            
                      
                      
            
                      
                      <div class="navbar-user" >
                  
                        
                        
            
                          @guest
                          <ul class="navbar-nav  d-none d-md-flex">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                         
                          
                    
                         
                         
                        </ul>
                      @else
                  
                        <div class="dropdown">
                    
                          <!-- Toggle -->
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->email }} <span class="caret"></span>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{route('user.editEmail')}}" class="dropdown-item">Setting</a>
                        
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>
    
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                          </div>
            
                        </div>
                     
                       @endguest
                      </div>
    
                      <div class="navbar-collapse mr-auto order-lg-first collapse" id="navbar" >
            
                        <!-- Form -->
                        
            
                        <!-- Navigation -->
                        <ul class="navbar-nav mr-auto">
                          @auth
                          @if(!auth()->user()->isAdmin)
                          <li class="nav-item">
                              <a class="nav-link" href="{{route('cashier.dashboard')}}" >
                                 Dashboard
                              </a>
                             
                            </li>
                            @endif
                        
                          @if(auth()->user()->isAdmin)
                          
                          
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.dashboard')}}" >
                               Dashboard
                            </a>
                           
                          </li>
                         
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="topnavDashboards" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Product
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="topnavDashboards">
                               
                                <li>
                                <a class="dropdown-item active" href="{{route('products.index')}}">
                                    Overview
                                  </a>
                                </li>
                              
                                <li>
                                    <a class="dropdown-item active" href="{{route('products.create')}}">
                                   create
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item active" href="{{route('productTypes.index')}}">
                                   Types
                                    </a>
                                  </li>
                              
                              </ul>
                            </li>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle " href="#" id="topnavClient" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Suppliers
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="topnavClient">
                                <li>
                                  <a class="dropdown-item " href="{{route('suppliers.index')}}">
                                    Overview
                                  </a>
                                </li>
                                <li>
                                  <a class="dropdown-item " href="{{route('suppliers.create')}}">
                                    create
                                  </a>
                                </li>
                
                                   
                              </ul>
                            </li>
                          
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle " href="#" id="topnavUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    manufacturer
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="topnavUsers">
                                    <li>
                                      <a class="dropdown-item active" href="{{route('manufacturers.index')}}">
                                        Overview
                                      </a>
                                    </li>
                                    <li>
                                      <a class="dropdown-item " href="{{route('manufacturers.create')}}">
                                        create
                                      </a>
                                    </li>
                                   
                                  </ul>
                                </li>
    
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " href="#" id="topnavDecoder" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Users
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="">
                                     <li>
                                     <a class="dropdown-item " href="{{route('user.index')}}">
                                        Overview
                                      </a>
                                     </li>
                                     <li>
                                     <a class="dropdown-item " href="{{route('user.create')}}">
                                        create
                                      </a>
                                     </li>
                                      
                                    </ul>
                                  </li>
                                  @endif
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " href="#" id="topnavDecoder" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Purchases
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="">
                                      @if(auth()->user()->isAdmin)
                                     <li>
                                    
                                     <a class="dropdown-item " href="{{route('purchase.index')}}">
                                        Overview
                                      </a>
                                     </li>
                                     @endif
                                     <li>
                                     <a class="dropdown-item " href="{{route('purchase.create')}}">
                                        create
                                      </a>
                                     </li>
                                     <a class="dropdown-item " href="{{route('purchase.cashier.index')}}">
                                      My purchases
                                    </a>
                                   </li>
                                      
                                    </ul>
                                  </li>
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " href="#" id="topnavDecoder" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Sales
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="">
                                      @if(auth()->user()->isAdmin)
                                     <li>
                                    
                                     <a class="dropdown-item " href="{{route('sales.index')}}">
                                        Overview
                                      </a>
                                     </li>
                                     @endif
                                     <li>
                                     <a class="dropdown-item " href="{{route('create.cart')}}">
                                        create
                                      </a>
                                     </li>
                                     <a class="dropdown-item " href="{{route('sales.cashier.index')}}">
                                      My sales
                                    </a>
                                    <a class="dropdown-item " href="{{route('bill.index')}}">
                                      bills
                                    </a>
                                   </li>
                                      
                                    </ul>
                                  </li>
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " href="#" id="topnavSubscription" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                     Stock
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnavSubscription">
                                      
                                    <a class="dropdown-item " href="{{route('stock.index')}}">
                                     Overview
                                    </a>
                                   
                                    <a class="dropdown-item " href="{{route('stock.removed')}}">
                                        Removed Product 
                                      </a>
                                    <a class="dropdown-item " href="{{route('stock.out')}}">
                                       out of stock
                                      </a>
                                     
                                   
                                      
                                    </div>
                                  </li>
                                  
                                  
    
                                  
                          
                                  @endauth
                                  @guest
                                  <li class="nav-item d-md-none">
                                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                  </li>
                                 
                                  @endguest
                          </ul>
                        
              
                        
              
                      </div> <!-- / .container -->
                      </div>
                    </nav>
                   
                    <div class="main-content">
                    @yield('content')
                    </div>
    
                    <script src="{{asset('js/all.js')}}"></script>
                    @yield('scripts')
    </body>
    </html>
                    
                  
                        