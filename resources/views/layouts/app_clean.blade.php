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
    <div class="container-fluid" style="background: #337ab7;">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <img src="/images/logo_stmik_baru_20081.jpg" alt="STMIK Banjarbaru" class="img-responsive" style="width:auto; height:60px; float: left; margin: 25px 10px 15px 30px;">

                <div class="lead text-center" style="margin-top: 15px; margin-bottom: 10px; color: #ffffff;">Selamat Datang di web<br> Monitoring Penentuan Indeks Kinerja Dosen <br> STMIK Banjarbaru</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ elixir('js/all.js') }}"></script>
</body>
</html>