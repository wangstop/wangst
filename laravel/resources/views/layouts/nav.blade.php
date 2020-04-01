<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.12.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.12.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Home</title>
  <link rel="stylesheet" href="{{asset('/assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap-grid.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap-reboot.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/socicon/css/styles.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/dropdown/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/tether/tether.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/theme/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/gallery/style.css')}}">
  <link rel="preload" as="style" href="{{asset('/assets/mobirise/css/mbr-additional.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/mobirise/css/mbr-additional.css')}}" type="text/css">



@yield('css')

</head>
<body>
  <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">



    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="/">
                         <img src="assets/images/laravel.png" alt="" style="height: 8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-white display-4" href="/">
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">

                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/news">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        最新消息
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/contactUs">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        聯絡我們
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/proucts_Types
                    ">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        產品
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="">
                        <?php
                        $cartCollection = Cart::getContent();
                        $count = $cartCollection->count();
                        ?>
                        購物車({{$count}})
                    </a>
                </li>

            </ul>


            {{-- <div class="navbar-buttons mbr-section-btn">
                <a class="btn btn-sm btn-primary display-4" href="/proucts_detail">
                    Shopping
                </a>
            </div> --}}
        </div>
    </nav>
</section>



@yield('content')



<section class="cid-qTkAaeaxX5" id="footer1-2">

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    <a href="">
                        <img src="assets/images/laravel.png" alt="" style="height: 8rem;">
                    </a>
                </div>
            </div>

        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-12 copyright">
                    <p class="mbr-text mbr-fonts-style display-7 text-center">
                        © Copyright 2020
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


  <script src="{{asset('/assets/web/assets/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/assets/popper/popper.min.js')}}"></script>
  <script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/assets/smoothscroll/smooth-scroll.js')}}"></script>
  <script src="{{asset('/assets/dropdown/js/nav-dropdown.js')}}"></script>
  <script src="{{asset('/assets/dropdown/js/navbar-dropdown.js')}}"></script>
  <script src="{{asset('/assets/touchswipe/jquery.touch-swipe.min.js')}}"></script>
  <script src="{{asset('/assets/tether/tether.min.js')}}"></script>
  <script src="{{asset('/assets/masonry/masonry.pkgd.min.js')}}"></script>
  <script src="{{asset('/assets/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('/assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js')}}"></script>
  <script src="{{asset('/assets/vimeoplayer/jquery.mb.vimeo_player.js')}}"></script>
  <script src="{{asset('/assets/parallax/jarallax.min.js')}}"></script>
  <script src="{{asset('/assets/theme/js/script.js')}}"></script>
  <script src="{{asset('/assets/gallery/player.min.js')}}"></script>
  <script src="{{asset('/assets/gallery/script.js')}}"></script>
  <script src="{{asset('/assets/slidervideo/script.js')}}"></script>


  @yield('js')

</body>
</html>
