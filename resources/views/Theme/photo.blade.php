@extends('Theme.master')
@section('content')
    <!--===============================
    CONTENT
===================================-->

    <div class="fixed-bg">
        <img src="/theme/images/1.jpg">
    </div>


    <div class="main-content">
        @foreach($gallery->photos as  $photo)
        <div class="container-fluid">
            @if(app()->getLocale()=='ar')
            <h1 class="main-heading">{{$gallery->ar_name}}</h1>
            @else
                <h1 class="main-heading">{{$gallery->en_name}}</h1>

            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="/storage/{{$gallery->image}}">
                        <img src="/storage/{{$gallery->image}}" alt="img">
                    </a>
                </div>

            </div>

        </div>
        @endforeach
    </div>


@endsection
