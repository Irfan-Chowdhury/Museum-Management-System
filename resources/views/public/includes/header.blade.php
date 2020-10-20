    @php

    $museum = DB::table('museums')->orderBy('id', 'desc')->first(); //update
    
    @endphp
    <!-- toggle top area -->
    <div class="hidden-top">
        <div class="hidden-top-inner container">
          <div class="row">
            <div class="span12">
              <ul>
                <li><strong>We are available for any custom works</strong></li>
                {{-- @foreach ($museum as $item) --}}
                  <li>Main office: {{$museum->address}}</li>
                  {{-- <li>{{$item->address}}</li> --}}
                  <li>Call us <i class="icon-phone"></i> (+88) {{$museum->phone}} </li>
                {{-- @endforeach --}}
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end toggle top area -->
      <!-- start header -->
      <header>
        <div class="container">
          <!-- hidden top area toggle link -->
          <div id="header-hidden-link">
            <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top"><i></i>Open</a>
          </div>
          <!-- end toggle link -->



          <!-- =========================== Authentication Check Start =========================== -->

            <div class="row nomargin">
              <div class="span12">
                <div class="headnav">
                  <ul>

                  <!--Loggin Check Start-->  
                  @if (Auth::check()==false) 
                      <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
                      <li><a href="#mySignin" data-toggle="modal">Sign in</a></li>
                  @endif
                  <!--Loggin Check End -->    

                  </ul>
                </div>
                <!-- Signup Modal -->
                <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="mySignupModalLabel">Create an <strong>account</strong></h4>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('user-registration')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                      @csrf

                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Full Name</label>
                        <div class="controls">
                          <input type="text" name="name" id="inputEmail" placeholder="Full Name"> <br>
                          @error('name')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                          <input type="email" name="email" id="inputEmail" placeholder="Email"> <br>
                          @error('email')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Phone (+880)</label>
                        <div class="controls">
                          <input type="number" name="phone" id="inputEmail" placeholder="Phone"> <br>
                          @error('phone')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Address</label>
                        <div class="controls">
                          <textarea type="text" name="address" id="inputEmail" rows="3" placeholder="Your Address"></textarea> <br>
                          @error('address')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Upload Image</label>
                        <div class="controls">
                          <input type="file" name="photo" id="inputEmail"> <br>
                          @error('photo')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="inputSignupPassword">Password</label>
                        <div class="controls">
                          <input type="password" name="password" id="inputSignupPassword" placeholder="Password"> <br>
                          @error('password')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="inputSignupPassword2">Confirm Password</label>
                        <div class="controls">
                          <input type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm Password"> <br>
                          @error('password_confirmation')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="control-group">
                        <div class="controls">
                          <button type="submit" class="btn btn-info">Sign up</button>
                        </div>
                        <p class="aligncenter margintop20">
                          Already have an account? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign in</a>
                        </p>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- end signup modal -->
                <!-- Sign in Modal -->
                <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="mySigninModalLabel">Login to your <strong>account</strong></h4>
                  </div>
                  <div class="modal-body">

                    <form class="form-horizontal" action="{{route('user-login')}}" method="POST">
                      @csrf
                      
                      <div class="control-group">
                        <label class="control-label" for="inputText">Email</label>
                        <div class="controls">
                          <input type="email" name="email" id="inputText" placeholder="Email" value="{{old('email')}}"> <br>
                          @error('email')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="inputSigninPassword">Password</label>
                        <div class="controls">
                          <input type="password" name="password" id="inputSigninPassword" placeholder="Password"> <br>
                          @error('password')
                            <span style="color:red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="control-group">
                        <div class="controls">
                          <button type="submit" class="btn">Sign in</button>
                        </div>
                        <p class="aligncenter margintop20">
                          Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
                        </p>
                      </div>

                    </form>
                  </div>
                </div>
                <!-- end signin modal -->
                <!-- Reset Modal -->
                <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="myResetModalLabel">Reset your <strong>password</strong></h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal">
                      <div class="control-group">
                        <label class="control-label" for="inputResetEmail">Email</label>
                        <div class="controls">
                          <input type="text" id="inputResetEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="controls">
                          <button type="submit" class="btn">Reset password</button>
                        </div>
                        <p class="aligncenter margintop20">
                          We will send instructions on how to reset your password to your inbox
                        </p>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- end reset modal -->
              </div>
            </div>

          {{-- @endif --}}
          <!--  ========================== Authentication Check End  ===========================-->
          


          <div class="row">
            <div class="span4">
              <div class="logo">
                <a href="index.html"><img src="{{asset('public/img/logo.png')}}" alt="" class="logo" /></a>
                <h1>Museum Management System</h1>
              </div>
            </div>
            <div class="span8">
              <div class="navbar navbar-static-top">
                <div class="navigation">
                  <nav>
                    <ul class="nav topnav">

                      <!-- ================ By Route URL ============== -->

                      {{-- <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{route('home')}}">Home</a>
                      </li>
                      <li class="{{ Request::is('front/about') ? 'active' : '' }}">
                        <a href="{{route('about')}}">About</a>
                      </li> --}}
                     
                      <!-- ================ By Route Name -1 ============== -->

                      {{-- <li class="{{ Route::is('home') ? 'active' : '' }}">
                        <a href="{{route('home')}}">Home</a>
                      </li>
                      <li class="{{ Route::is('front.about') ? 'active' : '' }}">
                        <a href="{{route('front.about')}}">About</a>
                      </li> --}}

                      <!-- ================ By Route Name -2 ============== -->

                      {{-- <li class="{{ Route::currentRouteNamed('home') ? 'active' : ''}}">
                        <a href="{{route('home')}}">Home1</a>
                      </li>
                      <li class="{{ Route::currentRouteNamed('front.about') ? 'active' : ''}}">
                        <a href="{{route('front.about')}}">About1</a>
                      </li> --}}

                      <li class="{{ Route::currentRouteNamed('home') ? 'active' : ''}}">
                        <a href="{{route('home')}}">Home</a>
                      </li>
                      <li class="{{ Route::currentRouteNamed('about') ? 'active' : ''}}">
                        <a href="{{route('about')}}">About</a>
                      </li>
                      <li class="{{ Route::currentRouteNamed('gallery') ? 'active' : ''}}">
                        <a href="{{route('gallery')}}">Gallery</a>
                      </li>
                      <li class="{{ Route::currentRouteNamed('contact') ? 'active' : ''}}">
                        <a href="{{route('contact')}}">Contact</a>
                      </li>

                      <!-- Loggin Check Start  -->
                      @if (Auth::check())
                          <li class="{{ Route::currentRouteNamed('item*') ? 'active' : ''}}">
                            <a href="{{route('item-info')}}">Item Info</a>
                          </li>
                          <li class="dropdown {{ Request::is('donation*') ? 'active' : '' }}"> <!--By Url-->
                            <a href="#">Donation <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                              <li><a href="{{route('donation-create')}}">Add New Donation</a></li>
                              <li><a href="{{route('donation-list')}}">Your Donation History</a></li>
                            </ul>
                          </li>
                          <li class="dropdown {{ Request::is('others*') ? 'active' : '' }}">
                            <a href="#">Others<i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                              <li><a href="{{route('notice')}}">Notice</a></li>
                              <li><a href="{{route('rule')}}">Rules</a></li>
                              <li><a href="{{route('schedule')}}">Visiting Time</a></li>
                              {{-- <li><a href="{{route('item-info')}}">Item Info</a></li> --}}
                            </ul>
                          </li>
                          <li class="dropdown {{ Request::is('user*') ? 'active' : '' }}">
                            <a href="#"> {{Auth::user()->name}} <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                              <li><a href="{{route('user-profile')}}">Profile</a></li>
                              <li><a href="{{route('user-password-change')}}">Change Password</a></li>
                              <li><a href="{{route('user-logout')}}">Logout</a></li>
                            </ul>
                          </li>
                      @endif
                      <!-- Loggin Check End  -->

                    </ul>
                  </nav>
                </div>
                <!-- end navigation -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- end header -->

      {{-- =================================== Session Message ============================= --}}
      @if (session()->has('error'))
        <div class="row">
          <div class="span4"></div>
          <div class="span6">
              <h6 style="color:red"><strong>Opps !!</strong> {{ session('message') }}</h6>      
          </div>
        </div>
      @elseif (session()->has('success'))
        <div class="row">
          <div class="span4"></div>
          <div class="span6">
            <h6 style="color:green"><strong> @if(session()->has('welcome')) {{ session('welcome') }} @else Congratulation !!  @endif</strong> {{ session('message') }}</h6>
          </div>
        </div>
      @endif
      