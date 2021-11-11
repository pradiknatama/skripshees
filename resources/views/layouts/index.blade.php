<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/index/bs5/dist/css/bootstrap.min.css">

    <!-- icon -->
    <link rel="stylesheet" href="/index/icon/css/all.min.css">

    <!-- CSS Lainnya -->
    <link rel="stylesheet" href="/index/css/navbar.css">
    <link rel="stylesheet" href="/index/css/body.css">
    <link rel="stylesheet" href="/index/css/responsive.css">
    
    <title>KOLAMKU</title>
</head>

<body>

    <!-- navbar menu -->
    <nav class="navbar navbar-expand-lg navbar-light mt-4 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span>KOLA<span class="warna">MKU</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <div></div>
                <ul class="nav nav-pills">
                    {{-- <li class="nav-item">
                        <a class="nav-link active bg-active link tebel-sedang" href="#">About &nbsp;&nbsp;</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link link tebel-sedang" href="#">Services &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link tebel-sedang" href="#">Product &nbsp;&nbsp;</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link link tebel-sedang me-5" href="#">Blog &nbsp;&nbsp;</a>
                    </li> --}}
                </ul>

                <a href="login" class="btn bg-custom rounded-pill tebel-sedang shadow">Login</a>
            </div>
        </div>
    </nav>

    <!-- konten -->

    <div class="container">

        <br><br><br>

        <div class="row mt-5 mb-5">

            <div class="col-lg-12 gambar">
                <img src="/index/assets/vector-konten.png" width="100%">
            </div>

            <div class="col-sm-12 position-relative p-4">

                <div class="position-absolute top-0 end-0">
                    <img src="/index/assets/vector-konten.png" class="img">
                </div>

                <h1 class="display-1 text-truncate tebel-sedang">Monitoring Kolam Ikan</h1>
                <h1 class="display-1 text-truncate tebel-sedang">Menjadi Lebih Mudah</h1>

                <div class="desc mt-4">
                    <p>sistem kontrol dan monitoring kualitas air pada kolam ikan berbasis internet of things </p>
                </div>

                <div class="mt-5">
                    <a href="#" class="button rounded-pill shadow tebel-sedang">Contact Us</a>
                </div>

                <br>

                <div class="mt-5">
                    <a href="#" class="btn rounded-circle bg-custom shadow tebel-sedang me-2"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="btn rounded-circle bg-custom shadow tebel-sedang me-2"><i
                            class="fab fa-twitter"></i></i></a>
                    <a href="#" class="btn rounded-circle bg-custom shadow tebel-sedang"><i
                            class="fab fa-facebook-f"></i></a>
                </div>

            </div>

        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/index/bs5/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/index/icon/js/all.min.js"></script>
    <script src="/index/js/onscroll.js"></script>


</body>

</html>