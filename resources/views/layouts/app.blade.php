<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>Micul Magazin</title>



    <!-- Styles -->

	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{asset('css/home.css')}}" rel="stylesheet">

    <link href="{{asset('css/perfect-scrollbar.css')}}" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Arvo|Lato|Roboto" rel="stylesheet">

    @yield('stylesheets')

</head>

<body>

    <div id="app">

        <nav class="navbar navbar-default navbar-static-top">

            <div class="container">

                <div class="navbar-header">



                    <!-- Collapsed Hamburger -->

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">

                        <span class="sr-only">Toggle Navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>



                    <!-- Branding Image -->

                    <a class="navbar-brand" href="{{ url('/') }}">

                        <img src="{{asset('img/logo.svg')}}" alt="Micul magazin pentru amatorii de cumparaturi"/>

                    </a>

					<div class="navbar-collapse">

						<!-- Left Side Of Navbar -->

						<ul class="nav navbar-nav">



						</ul>



						<!-- Right Side Of Navbar -->

						<ul class="nav navbar-nav navbar-right">

							<!-- Authentication Links -->

							@if(Auth::guard('admin')->check())

								<li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>

							@endif

							@if(Auth::guard('client')->check())

								<li><a href="#0">Profil</a></li>

							@endif

							@if(!Auth::guard('client')->check() && !Auth::guard('admin')->check())

				

							<li>

								<div class="dropdown" id="accounts">

									<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">

   										<i class="icon-login"></i>

									</button>

									<ul class="dropdown-menu">

										<li><a class="dropdown-item" href="{{route('login')}}">Autentificare</a></li>

										<li><a class="dropdown-item" href="{{route('register')}}">Inregistrare</a></li>

										

										

									</ul>

								</div>

							</li>

							<li>

								<div class="dropdown" id="cart">

									<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">

   										<i class="icon-cart"></i>

										<div class="num-items-in-cart"><span class="number">10</span></div>

									</button>

									<ul class="dropdown-menu" id="cart-info">

										<div id="cart-content">

											<div class="empty text-center">

												<em>Cosul de cumparaturi este gol. </em>

											</div>

										</div>

									</ul>

								</div>

							</li>

								

							@endif

							@auth('admin')

								<li><a href="{{route('orders')}}">Comenzi</a></li>

								<li class="dropdown">

									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">

										Categorii <span class="caret"></span>

									</a>



									<ul class="dropdown-menu">

										<li>

											<a href="{{ route('category.add.show') }}">

												Adauga categorie

											</a>

										</li>

										<li>

											<a href="{{route('categories') }}">

												Lista categorii

											</a>

										</li>

									</ul>

								</li>

								<li class="dropdown">

									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">

										Produse <span class="caret"></span>

									</a>



									<ul class="dropdown-menu">

										<li>

											<a href="{{ route('product.add.show') }}">

												Adauga produse

											</a>

										</li>

										<li>

											<a href="{{route('products') }}">

												Lista produse

											</a>

										</li>

										<hr>

										<li>

											<a href="{{route('colors')}}">

												Culori

											</a>

										</li>

										<li>

											<a href="{{route('lengths')}}">

												Marimi

											</a>

										</li>

									</ul>

								</li>

								<li class="dropdown">

									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">

										{{ Auth::guard('admin')->user()->name }} <span class="caret"></span>

									</a>



									<ul class="dropdown-menu">

										<li>

											<a href="{{ route('adminLogout') }}"

												onclick="event.preventDefault();

														 document.getElementById('logout-form').submit();">

												Logout

											</a>



											<form id="logout-form" action="{{ route('adminLogout') }}" method="POST" style="display: none;">

												{{ csrf_field() }}

											</form>

										</li>

									</ul>

								</li>

								@endauth

								@auth('client')

										<li class="dropdown">

											<a href="profile" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">

												{{ Auth::guard('client')->user()->last_name }} {{ Auth::guard('client')->user()->first_name }} <span class="caret"></span>

											</a>



											<ul class="dropdown-menu">

												<li>

													<a href="{{ route('userLogout') }}"

													   onclick="event.preventDefault();

														 document.getElementById('logout-form').submit();">

														Logout

													</a>



													<form id="logout-form" action="{{ route('userLogout') }}" method="POST" style="display: none;">

														{{ csrf_field() }}

													</form>

												</li>

											</ul>

										</li>

								@endauth

						</ul>

					</div>

                </div>



              

            </div>

        </nav>

        <nav class="navbar navbar-default second-navbar-home"  id="app-navbar-collapse">

            <div class="container" style="position: relative;">



                <ul class="nav navbar-nav col-md-9">

                    <li class="left-nav-item"><a href="{{route('home')}}">Acasa</a></li>



                    <li class="dropdown dropdown-change">

                        <a class="white dropdown-toggle" data-toggle="dropdown" href="#">Catalog

                            <span class="caret"></span>

                        </a>

                        <div class="dropdown-menu">

                            <ul class="dropdown-extend">

                                @foreach($categories as $category)

                                <li>

								    <ul>

									    <li class="list-title"><a href="#" class="">{{$category->name}}</a></li>

									

										    <ul class="" id="scrollbar">

											    @if(count($category->subcategories)>0)

												    @foreach($category->subcategories as $subcat)

												    <li><a href="#" class="">{{$subcat->name}}</a></li>

												    @endforeach

											    @endif

										    </ul>

									

								    </ul>

                                

                                </li>

                                @endforeach

                            </ul>

                        </div>

                    </li>

					<li class="left-nav-item"><a href="{{route('aboutUs')}}">Despre noi</a></li>

                    <li class="left-nav-item"><a href="{{route('contact')}}">Contact</a></li>

                </ul>

                

                <div class="header-search col-md-3">

					<div class="row">

						<form id="header-search" class="search-form" action="/search" method="get">

							<button type="submit" class="search-submit" title="search"><i class="fa fa-search"></i></button>

							<input type="hidden" name="type" value="product">

							<input type="text" class="" name="q" value="" accesskey="4" autocomplete="off" placeholder="Cauta in magazin...">

						</form>

					</div>

				</div>

            </div>

        </nav>



        @yield('content')



        <footer>



                <div class="container">

                    <div class="row">

                        <div class="col-md-4">

                            <h4>Comenzi si livrare</h4>

                            <ul>

                                <li><a href="#0">Cum cumpar?</a></li>

                                <li><a href="#0">Politica de retururi</a></li>

                                <li><a href="#0">Intrebari frecvente</a></li>

                            </ul>



                            <div class="social-icons">

                                <ul>

                                    <li><a href="#0"><i class="fa fa-facebook social-icons-item" aria-hidden="true"></i></a>

                                    </li>

                                    <li><a href="#0"><i class="fa fa-twitter social-icons-item" aria-hidden="true"></i></a></li>

                                    <li><a href="#0"><i class="fa fa-instagram social-icons-item" aria-hidden="true"></i></a></li>

                                </ul>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <h4>Informatii utile</h4>

                            <ul>

                                <li><a href="#0">Contact</a></li>

								

                                <li><a href="#0">Termeni si conditii</a></li>

                                <li><a href="#0">Politica de confidentialitate</a></li>

								<li><a href="#0">Harta site</a></li>

								<li><a href="#0">ANPC</a></li>

                            </ul>

                        </div>

                        <div class="col-md-4">

                            <div class="box-wrapper">

                                 <img src="{{asset('img/logo.svg')}}" alt="Micul magazin pentru amatorii de cumparaturi"/>

								 <h4>Pentru amatorii de cumparaturi</h4>

                                <hr>

                                <div class="contact">

                                    <ul>

                                        <li><span class="glyphicon glyphicon-map-marker"></span> Adresa</li>

                                        <li><span class="glyphicon glyphicon-earphone"></span> 22-22-22</li>

                                        <li><span class="glyphicon glyphicon-envelope"></span> office@miculmagazin.ro</li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



        </footer>

        <section class="main-footer">

            <div class="container">

                <h5 class="">&copy; @php echo date("Y");@endphp Micul Magazin. Toate drepturile rezervate.</h5>

            </div>

        </section>

    </div>



    <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{--  s  --}}

	<script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('js/jquery.ez-plus.js') }}"></script>

    <script src="{{ asset('js/perfect-scrollbar.js') }}"></script>

    <script type="text/javascript">

        if (window.location.hash == '#_=_'){

            history.replaceState

                ? history.replaceState(null, null, window.location.href.split('#')[0])

                : window.location.hash = '';

        }



        window.onload = function(){ 

            var $ = document.querySelector.bind(document);



            var ps = new PerfectScrollbar('#scrollbar');

			var vs = new PerfectScrollbar('#categories');



            function updateSize() {

              var width = parseInt($('#width').value, 10);

              var height = parseInt($('#height').value, 10);



              $('#scrollbar').style.width = width + 'px';

              $('#scrollbar').style.height = height + 'px';



			  $('#categories').style.width = width + 'px';

              $('#categories').style.height = height + 'px';



              ps.update();

			   vs.update();

            }

        };



    </script>

    @yield('javascripts')

</body>

</html>

