<!DOCTYPE html>
<html lang="en">

<head></head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Books">
<meta name="author" content="Shivangi Gupta">
<title>Online Bookstore</title>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/my.css')}}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle " data-target="bs-example-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="{{asset('img/logo2.png')}}" style="height: 52px; width: 100px;margin: 0px;"></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    @guest
                    @if (Route::has('login'))

                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                        @else
                        <li>
                            <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal">
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                            </button>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            </button>
                        </li>
                        @endif
                        @endauth

                    </div>

                    @endif
                    <a href="{{asset('cart')}}" class="btn btn-lg"> Swtich to cart </a>

                    @if (Route::has('register'))
                    <li>
                        <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        </button>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                    <li>
                        <a href="{{route('cart')}}" class="btn btn-lg"> Cart </a>
                    </li>

                </ul>
            </div>




        </div>
    </nav>
    <div id="top">
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form action="{{ route('search') }}" method="get" class="form-inline">
                    <input type="text" name="name" class="form-control" placeholder="Search for a Book" style="width:70%;margin:20px 10% 20px 10%;">
                    <button type="submit" class="btn btn-outline-dark">Search</button>

                </form>
            </div>
        </div>
    </div>
    @yield('content')


    <footer style="margin-left:-6%;margin-right:-6%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1 col-md-1 col-lg-1">
                </div>
                <div class="col-sm-7 col-md-5 col-lg-5">
                    <div class="row text-center">
                        <h2>Let's Get In Touch!</h2>
                        <hr class="primary">
                        <p>Still Confused? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <span class="glyphicon glyphicon-earphone"></span>
                            <p>0599777222</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <p>BookStore@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="hidden-sm-down col-md-2 col-lg-2">
                </div>
                <div class="col-sm-4 col-md-3 col-lg-3 text-center">
                    <h2 style="color:palevioletred">Follow Us At</h2>
                    <div>
                        <a href="https://twitter.com">
                            <img title="Twitter" alt="Twitter" src="{{asset('img/social/twitter.png')}}" width="35" height="35" />
                        </a>
                        <a href="https://www.linkedin.com">
                            <img title="LinkedIn" alt="LinkedIn" src="{{asset('img/social/linkedin.png')}}" width="35" height="35" />
                        </a>
                        <a href="https://www.facebook.com">
                            <img title="Facebook" alt="Facebook" src="{{asset('img/social/facebook.png')}}" width="35" height="35" />
                        </a>
                        <a href="https://google.com">
                            <img title="google+" alt="google+" src="{{asset('img/social/google.jpg')}}" width="35" height="35" />
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="container">
        <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">Ask query</button>
        <div class="modal fade" id="query" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ask your query here</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
