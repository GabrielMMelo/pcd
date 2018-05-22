
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Emakers Júnior')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        @section('link')
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/btp.css')}}" rel="stylesheet" type="text/css">
        @show

	@section('script')
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	@show

        @section('snackbar')
                <script src="{{asset('js/snackbar.js')}}"></script>
                <link href="{{asset('css/snackbar.css')}}" rel="stylesheet" type="text/css">
        @show
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-@yield('nav-color','light')">
                @if ($__env->yieldContent('nav-logo') === "black" )
                <a class="collapse navbar-collapse" id="navbarImg" href="#"><img  src="{{asset('img/emakersjr-black.png')}}" height="60em"></a>
                @elseif ($__env->yieldContent('nav-logo') === "white" )
                <a class="collapse navbar-collapse" id="navbarImg" href="#"><img  src="{{asset('img/emakersjr-white.png')}}" height="60em"></a>
                @else
                <a class="collapse navbar-collapse" id="navbarImg" href="#"><img  src="{{asset('img/emakersjr-colored.png')}}" height="60em"></a>
                @endif
                <div class="container">

                        <a class="navbar-brand h1 mb-0" href="#"> Home </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite,#navbarImg">

                                <span class="navbar-toggler-icon"></span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSite">

                                <ul class="navbar-nav mr-auto">
                                @section('nav-items')
                                        <li class="nav-item mr-2">
                                                <a class="nav-link" href="blog.html">Blog</a>
                                        </li>

                                        <li class="nav-item mr-2">
                                                <a class="nav-link" href="#servicos">Serviços</a>
                                        </li>

                                        <li class="nav-item mr-2">
                                                <a class="nav-link" href="equipe.html">Equipe</a>
                                        </li>
                                        <li class="nav-item mr-2">
                                                <a class="nav-link" href="contato.html">Contato</a>
                                        </li>
                                @show
                                </ul>

	                        <ul class="navbar-nav navbar-right">
            		            <!-- Authentication Links -->
                        		@guest
		                        <li><a href="{{ route('login') }}">Login</a></li>
                		        <li><a href="{{ route('register') }}">Register</a></li>
		                        @else

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">{{ Auth::user()->name }}</a>
						<ul class="dropdown-menu" >
							<li>
                        		    			<a  class="dropdown-item"  href="{{ route('logout') }}"
                	        	        	        	onclick="event.preventDefault();
                                        	        		document.getElementById('logout-form').submit();">
	                                		        	<span class="text-danger ">Logout</span>
	       	                  	        		</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>

					<!--
                		        <li class="dropdown">
                                		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
		                                {{ Auth::user()->name }} <span class="caret"></span>
                		                </a>

		                               	<ul class="dropdown-menu">
        		                            	<li>
                        		    	            <a class="dropdown-item" href="{{ route('logout') }}"
                	        	        	            onclick="event.preventDefault();
                                        	        	    document.getElementById('logout-form').submit();">
	                                		            Logout
        	                  	            	    </a>

	                                	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        	                                	    	{{ csrf_field() }}
	                	          	            </form>
                        	         	       </li>
	                              		</ul>
	        	                </li>-->
	                	        @endguest
	         	        </ul>
                        </div>
                </div>
        </nav>

   <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
   -->
            <div class="container text-center">
                @yield('content')
            </div>
        </div>
    </body>
</html>