<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <link href=" {{ asset( 'css/monokai.css' ) }} " rel="stylesheet">
    <link href=" {{ asset( 'css/themify-icons.css' ) }} " rel="stylesheet">
    <link href=" {{ asset( 'css/font-awesome.min.css' ) }} " rel="stylesheet">
    <link href=" {{ asset( 'css/jquery-ui.min.css' ) }} " rel="stylesheet" />
    <link href=" {{ asset( 'css/lobipanel.min.css' ) }} " rel="stylesheet" />
    <link href=" {{ asset( 'css/sidebar.css' ) }} " rel="stylesheet">
    <link href=" {{ asset( 'css/bootstrap.min.css' ) }} " rel="stylesheet">
    <link href=" {{ asset( 'css/style.css' ) }} " rel="stylesheet">
    <link href=" {{ asset( 'css/doc-style.css' ) }} " rel="stylesheet">
    <link href=" {{ asset( 'css/helper.css' ) }} " rel="stylesheet">



</head>

<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li><a href="{{route('categories.index')}}"> Categories </a></li>
                    <li><a href="{{route('products.index')}}"> Products </a></li>
                    <li><a href="{{route('orders.index')}}"> Orders </a></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- /sidebar Sidebar -->

    <div class="header">
        <div class="pull-left">
            <div class="logo"><span>Book store</span></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>

    </div>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <div class="main-content">
                    @yield('main')
                </div>
            </div>


        </div>
    </div>

    <script src=" {{ asset( 'js/jquery.min.js' ) }} "></script>
    <script src=" {{ asset( 'js/lobipanel.js' ) }} "></script>
    <script src=" {{ asset( 'js/jquery-ui.min.js' ) }} "></script>
    <script src=" {{ asset( 'js/jquery.ui.touch-punch.min.js' ) }} "></script>
    <script src=" {{ asset( 'js/jquery.nanoscroller.min.js' ) }} "></script>
    <script src=" {{ asset( 'js/sidebar.js' ) }} "></script>
    <script src=" {{ asset( 'js/bootstrap.min.js' ) }} "></script>
    <script src=" {{ asset( 'js/underscore-min.js' ) }} "></script>
    <script src=" {{ asset( 'js/highlight.min.js' ) }} "></script>

    <script src=" {{ asset( 'js/scripts.js' ) }} "></script>

</body>

</html>