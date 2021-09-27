<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style1.css')}}">
    
    <!-- {{-- <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/logo/Logo Header banget.png"> --}} -->
</head>
<body>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                {{-- <img src="/assets/img/logo/Logo Header.png" class="my-4" style="max-width:120px" alt="" /> --}}
                <h2>KOLAMKU</h2>
            </div>
            <i class="bx bx-menu bx-sm" id="btn_navbar"></i>
        </div>
        <ul class="nav_list">
            <li class="list active">
                <a href="#">
                    <i class='bx bx-home bx-sm'></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <i class='bx bx-transfer-alt bx-sm' ></i>
                    <span class="title">Riwayat Pengurasan</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <i class='bx bx-user bx-sm' ></i>
                    <span class="title">My Account</span>
                </a>
            </li>
            <li class="list">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out'></i>
                    <span class="title">Log Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                </form>
            </li>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
        </ul>
    </div>
    @yield('content')

    <script src="/assets/Bahan Websensor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @stack('prepend-script')
    @stack('addon-script')


</body>
</html>