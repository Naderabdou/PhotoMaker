@extends('Theme.master')
@section('content')
    <!--===============================
    SLIDER
===================================-->

    <div id="owl-demo" class="owl-carousel owl-theme">

        <div class="item"><img src="/theme/images/1.jpg" alt="..."></div>
        <div class="item"><img src="/theme/images/2.jpg" alt="..."></div>
        <div class="item"><img src="/theme/images/3.jpg" alt="..."></div>

    </div>

    <div class="hidden">
        <a class="btn owl-btn next"><span class="fa fa-angle-right"></span></a>
        <a class="btn owl-btn prev"><span class="fa fa-angle-left"></span></a>
    </div>
@endsection
