<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
    @stack('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-4">
                    <div class="pull-right">
                    <br>  
                    <img src="/img/logo.png" alt="STMIK Banjarbaru" class="img-responsive" style="width:auto; height:60px;">
                    </div>
                </div> -->

                <div class="col-md-12 text-center">
                    <h3>Monitoring Penentuan Indeks Kinerja Dosen STMIK Banjarbaru</h3>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/home') }}"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li><a href="{{ route('profile.show') }}"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Keluar
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        @include('layouts.app_menu')
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    @yield('heading')                
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @include('flash::message')
                </div>
            </div>
            <div class="row">
                @yield('content')
            </div>            
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ elixir('js/all.js') }}"></script>
    <script src="{{ elixir('js/vendor.js') }}"></script>
    @stack('js')
</body>
</html>