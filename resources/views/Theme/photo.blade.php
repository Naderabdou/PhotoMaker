@extends('Theme.master')
@section('content')
    <!--===============================
    CONTENT
===================================-->

    <div class="fixed-bg">
        <img src="/theme/images/1.jpg">
    </div>


    <div class="main-content">
        <div class="container-fluid">
            @if(app()->getLocale()=='ar')
            <h1 class="main-heading">{{$gallery->ar_name}}</h1>
            @else
                <h1 class="main-heading">{{$gallery->en_name}}</h1>

            @endif
            <div class="row">
                @foreach($gallery->photos as  $photo)

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="/storage/{{$photo->image}}">
                        <img src="/storage/{{$photo->image}}" alt="img">
                    </a>
                </div>
                @endforeach


            </div>

        </div>
    </div>


@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="/theme/image-popup/source/jquery.fancybox.css?v=2.1.5" media="screen">
    <link rel="stylesheet" type="text/css" href="/theme/image-popup/source/helpers/jquery.fancybox-buttons.css?v=1.0.5">
@endsection
@section('js')
    <script type="text/javascript" src="/theme/image-popup/source/jquery.fancybox.js?v=2.1.5"></script>
    <script type="text/javascript" src="/theme/image-popup/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script>
        $(document).ready(function (){
            /*Button helper. Disable animations, hide close button, change title type and content*/

            $('.fancybox-buttons').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',

                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : false,

                helpers : {
                    title : {
                        type : 'inside'
                    },
                    buttons	: {}
                },

                afterLoad : function() {
                    this.title = '<a href="#" class="btn btn-fb btn-small"><i class="fa fa-facebook right-fa"></i> Share</a>' +
                        '<a href="#" class="btn btn-tw btn-small"><i class="fa fa-twitter right-fa"></i> Share</a>' +
                        '<a href="#" class="btn btn-inst btn-small"><i class="fa fa-instagram right-fa"></i> Share</a>';
                }
            });


        });
    </script>
@endsection
