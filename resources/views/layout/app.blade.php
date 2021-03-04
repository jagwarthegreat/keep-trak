<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Keep-trak</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('assets/css/light-bootstrap-dashboard.css?v=2.0.0')}}" rel="stylesheet" />

    <style>
        * {
            /* font-size: 14px !important; */
            font-family: 'Montserrat';
        }
    </style>


    <!--   Core JS Files   -->
    <script src="{{URL::to('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/js/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

    <script src="{{URL::to('assets/js/plugins/bootstrap-switch.js')}}"></script>
    <script src="{{URL::to('assets/js/plugins/chartist.min.js')}}"></script>
    <script src="{{URL::to('assets/js/plugins/bootstrap-notify.js')}}"></script>
    <script src="{{URL::to('assets/js/light-bootstrap-dashboard.js?v=2.0.0')}}" type="text/javascript"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="{{URL::to('assets/img/sidebar-5.jpg')}}">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Keep-trak
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li nav-item>
                        <a class="nav-link" href="{{route('loc')}}">
                            <i class="nc-icon nc-square-pin"></i>
                            <p>Location</p>
                        </a>
                    </li>
                    <li nav-item>
                        <a class="nav-link" href="{{route('cat')}}">
                            <i class="nc-icon nc-layers-3"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li nav-item>
                        <a class="nav-link" href="{{URL::to('/item')}}">
                            <i class="nc-icon nc-app"></i>
                            <p>Item</p>
                        </a>
                    </li>
                    <li nav-item>
                        <a class="nav-link" href="{{URL::to('/transfer')}}">
                            <i class="nc-icon nc-delivery-fast"></i>
                            <p>Transfer</p>
                        </a>
                    </li>

                    <li class="nav-item active-pro">
                        <a class="nav-link text-center" href="#">
                            <p>Made by Judywen Guapin</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">

                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('user')}}">Users</a>
                                    <!-- <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Logout</a> -->
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a type="submit" class="dropdown-item" href="{{route('logout')}}">{{ __('Log out') }}</a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
</body>

</html>