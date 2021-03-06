<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    {{-- <link rel="stylesheet" type="text/css" href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style1.css')}}">
    @stack('prepend-style')
    @stack('addon-style')
    <!-- {{-- <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/logo/Logo Header banget.png"> --}} -->
</head>
<body>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                {{-- <img src="/assets/img/logo/Logo Header.png" class="my-4" style="max-width:120px" alt="" /> --}}
                <h2>KOLAMKU</h2>
            </div>
            <i class="bx bx-menu " id="btn_navbar"></i>
        </div>
        <ul class="nav_list">
            <li class="list  {{'/home'==Request()->path()?'active':''}}">
                <a href="{{ url('/home') }}">
                    <i class='bx bx-home '></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            
            <li class="list {{'edit_akun'==Request()->path()?'active':''}}">
                <a href="{{ url('edit_akun') }}">
                    <i class='bx bx-user ' ></i>
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
        </ul>
    </div>
    
    @yield('content')

    <script src="/assets/Bahan Websensor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        let btn =document.querySelector("#btn_navbar");
        let sidebar =document.querySelector(".sidebar");
        
        btn.onclick =function(){
            sidebar.classList.toggle("active");
        }
  
        // let list = document.querySelectorAll('.list');
        // for(let i=0; i<list.length; i++){
        //     list[i].onclick=function(){
        //         let j=0;
        //         while(j<list.length){
        //             list[j++].className='list';
        //         }
        //         list[i].className = 'list active';
        //     }   
        // }
  
    </script>
    @stack('prepend-script')
    @stack('addon-script')


</body>
</html>