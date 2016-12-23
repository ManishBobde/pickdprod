	<nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
  					<span class="sr-only">Toggle navigation</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				</button>
  				<a class="navbar-brand" class="img-responsive logo-size" href="/"/> Pickd Portal</a>
  			</div>
  			<div id="navbar" class="navbar-collapse collapse">
  				<ul class="nav navbar-nav  navbar-right">
              <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{Auth::user()->profilePicUrl}}"
                                alt="{{ Auth::user()->userName }}"> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/user/getprofiledetails').'/'.Auth::id() }}">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/changepassword/')}}">
                                        Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
  					</ul>
  				</div><!--/.nav-collapse -->
  			</div>
  		</nav>