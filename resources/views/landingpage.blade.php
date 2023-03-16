<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <title>Pengaduan Masyarakat</title>

    <!-- Bootstrap core CSS -->
    <link href="landingpage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="landingpage/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="landingpage/assets/css/animated.css">
    <link rel="stylesheet" href="landingpage/assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="" class="logo">
                            <img src="landingpage/assets/images/1.png" alt="Pengaduan Masyarakat">
                            {{-- <h4 class="mt-4">Pengaduan Masyarakat</h4> --}}

                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li></li>
                            <li></li>
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Tutorial</a></li>
                            <li class="scroll-to-section"><a href="#tentang">Tentang</a></li>
                            <li class="scroll-to-section">
                                <div class="border-button">
                                    <a href="{{ route('login') }}">Sign In</a>
                                </div>
                            </li>

                            <li>
                                <div class="gradient-button"><a id="modal_trigger" href="{{ route('register') }}"><i
                                            class="fa fa-sign-in-alt"></i> Sign Up</a></div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-10" style="color:white;">
                                        <h2>Layanan Pengaduan Masyarakat Online</h2>
                                        <p style="color:white;">Sampaikan laporan masalah Anda di sini, kami akan
                                            memprosesnya dengan cepat.</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-button">
                                            <a href="{{ route('laporan') }}">Laporkan Sekarang!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="landingpage/assets/images/slider-dec.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4>Bagaimana langkah-langkah dalam melaporkan <em>pengaduan masyarakat</em> pada aplikasi ini?
                        </h4>
                        <img src="landingpage/assets/images/heading-line-dec.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="service-item fourth-service">
                        <div class="icon"></div>
                        <h4>1. Tulis Laporan</h4>
                        <p class="mb-5">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                        <div class="text-button">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>2. Proses Verifikasi</h4>
                        <p>Dalam 1 hari, laporan Anda akan diverifikasi dan diteruskan kepada petugas berwenang</p>
                        <div class="text-button">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>3. Tindak Lanjut</h4>
                        <p class="mb-5">Dalam 3 hari, petugas akan menindaklanjuti dan membalas laporan Anda</p>
                        <div class="text-button">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>4. Selesai</h4>
                        <p class="mb-5">Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
                        <div class="text-button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tentang" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="section-heading">
                        <h4>Apa itu <em>Pengaduan Masyarakat</em> ?</h4>
                        <img src="landingpage/assets/images/heading-line-dec.png" alt="">
                        <p>Pengaduan Masyarakat adalah pengawasan yang dilakukan oleh masyarakat yang disampaikan secara
                            lisan atau tertulis kepada Pejabat Arsip Nasional Republik Indonesia (ANRI) yang
                            berkepentingan, berupa sumbangan pikiran, saran, gagasan, keluhan, atau pengaduan yang
                            bersifat membangun yang disampaikan baik secara langsung maupun melalui media.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#about">Objektivitas</a></h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#about">Efektivitas & Efesiensi</a></h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#about">Akuntabilitas</a></h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#about">Koordinasi</a></h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#about">Kerahasiaan</a></h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#about">Transparansi</a></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p>Itu adalah prinsip penanganan pengaduan masyarakat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-image">
                        <img src="landingpage/assets/images/about-right-dec.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-heading">
                        <h4>Pengaduan Masyarakat - Muhammad Mabi</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Contact Us</h4>
                        <p>Rio de Janeiro - RJ, 22795-008, Brazil</p>
                        <p><a href="#">010-020-0340</a></p>
                        <p><a href="#">info@company.co</a></p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">Free Apps</a></li>
                            <li><a href="#">App Engine</a></li>
                            <li><a href="#">Programming</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">App News</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">App Dev Team</a></li>
                            <li><a href="#">Digital Web</a></li>
                            <li><a href="#">Normal Apps</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>About Our Company</h4>
                        <div class="logo">
                            <img src="landingpage/assets/images/white-logo.png" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright © 2023 Pengaduan Masyarakat | Maybe Dev Company. All Rights Reserved.
                            <br>Design: <a href="https://instagram.com/mbiplx" target="_blank"
                                title="css templates">Muhammad Mabi</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="landingpage/vendor/jquery/jquery.min.js"></script>
    <script src="landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="landingpage/assets/js/owl-carousel.js"></script>
    <script src="landingpage/assets/js/animation.js"></script>
    <script src="landingpage/assets/js/imagesloaded.js"></script>
    <script src="landingpage/assets/js/popup.js"></script>
    <script src="landingpage/assets/js/custom.js"></script>
</body>

</html>
