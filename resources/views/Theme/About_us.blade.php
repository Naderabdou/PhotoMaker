@extends('Theme.master')
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
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });
        });
    </script>


@endsection


@section('content')
    <!--===============================
    CONTENT
===================================-->

    <div class="fixed-bg">
        <img src="/theme/images/1.jpg">
    </div>


    <div class="main-content">
        <div class="container">
            <h1 class="main-heading">{{__('Theme\home.about_us')}}</h1>
            @if(isset($AboutAdmin) && count($AboutAdmin))
            <div class="text-center div-padding">
                @foreach($AboutAdmin as $about)

                @if(app()->getLocale()=='ar')
               <p>{{$about->about_desc_ar}}</p>
                @else
                    <p>{{$about->about_desc_en}}</p>

                @endif
                    @endforeach

                <a href="{{route('gallery.index')}}" class="btn btn-white margin"><span>{{__('Theme\home.our_work')}}</span></a>
            </div>
            @else
                <div class="text-center div-padding">

                       <h2>{{__('Theme\home.no_date')}}</h2>
                    <hr>

                    <a href="{{route('gallery.index')}}" class="btn btn-white margin"><span>{{__('Theme\home.our_work')}}</span></a>
                </div>
            @endif


                <div class="div-small-padding">
                <h1 class="main-heading">{{__('Theme\home.Clients')}}</h1>

                <div class="row">
                    <div class="col-xs-2 col-sm-1 no-padding text-center">
                        <a class="owl-btn prev-pro margin"><span class="fa fa-angle-right"></span></a>
                    </div>

                    <div class="col-xs-8 col-sm-10 no-padding">
                        @if(isset($AboutAdmin) && count($AboutAdmin))
                        <div id="owl-demo-products" class="owl-carousel-clients">
                            @foreach($AboutAdmin as $about)

                            <div class="item">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="images/logo-1.jpg">
                                    <img src="storage/{{$about->client_img}}" alt="img">
                                    <span>Title:</span><p  style="display: inline"> {{$about->client_title}}</p>
                                </a>
                            </div>
                            @endforeach

                        </div>
                        @else

                                    <div class="item">
                                        <a class="fancybox-buttons" data-fancybox-group="button" >
                                            <h2 style="text-align: center">{{__('Theme\home.no_client')}}</h2>
                                            <hr>
                                        </a>
                                    </div>



                        @endif
                    </div>

                    <div class="col-xs-2 col-sm-1 no-padding text-center">
                        <a class="owl-btn next-pro margin"><span class="fa fa-angle-left"></span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
