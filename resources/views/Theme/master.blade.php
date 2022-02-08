<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale('')) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <title>Photo Maker</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="/theme/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/theme/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/theme/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/theme/css/style.css">
    @if(app()->getLocale() =='ar')

    <link rel="stylesheet" type="text/css" href="/theme/css/style-ar.css">
    @else
        <link rel="stylesheet" type="text/css" href="/theme/css/style-en.css">
    @endif

        @yield('css')
</head>

<body>

<!--===============================
    NAV
===================================-->

<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="fa fa-bars"></span>
                </button>

                <a href="/theme/index.html" class="navbar-brand hidden-sm hidden-md hidden-lg"><img src="/theme/images/logo.png" alt="LOGO"></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right text-align-left">
                    <li class="active"><a href="{{route('home.index')}}">{{__('theme\home.home')}}</a></li>
                    <li><a href="{{route('About.index')}}">{{__('theme\home.about_us')}}</a></li>
                    <li><a href="{{route('services.index')}}">{{__('theme\home.services')}}</a></li>
                </ul>

                <a href="/theme/index.html" class="navbar-brand hidden-xs text-center"><img src="/theme/images/logo.png" alt="LOGO"></a>

                <ul class="nav navbar-nav navbar-left text-align-right">
                    <li><a href="{{route('gallery.index')}}">{{__('theme\home.gallery')}}</a></li>
                    <li><a href="{{route('contact.index')}}">{{__('theme\home.contact')}}</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{app()->getLocale()}}
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu">
                            <a style="padding: 10px;" class="dropdown-item" href="{{route('lang','en')}}">{{__('theme\home.English')}}</a><br>
                            <a style="padding: 10px; " class="dropdown-item" href="{{route('lang','ar')}}">{{__('theme\home.Arabic')}}</a>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<!--===============================
    FOOTER
===================================-->

<footer class="text-center">
    <div class="container">

        <p>{{__('theme\home.footer')}} </p>
       @isset($social)
        <a href="{{$social->facebook_url}}"><i class="fa fa-facebook"></i></a>
        <a href="{{$social->twitter_url}}"><i class="fa fa-twitter"></i></a>
        <a href="{{$social->github_url}}"><i class="fa fa-github"></i></a>
        @endisset

    </div>
</footer>

<!--===============================
    SCRIPT
===================================-->

<script src="/theme/js/jquery-1.11.1.min.js"></script>
<script src="/theme/js/bootstrap.min.js"></script>
<script src="/theme/owl-carousel/owl.carousel.min.js"></script>
<script src="/theme/js/script.js"></script>
@yield('js')
</body>
</html>
