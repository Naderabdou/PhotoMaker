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
            <h1 class="main-heading">{{__('Theme\home.work')}}</h1>

            <div class="row">
                @if(isset($Gallery) && count($Gallery))
                @foreach($Gallery as $Gallery)
                <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                    <a href="{{route('gallery.show',$Gallery->id)}}" class="img-holder">
                        <img src="storage/{{$Gallery->image}}" alt="...">
               @if(app()->getLocale()=='ar')
                        <div class="hover-content">
                            <h1>{{$Gallery->ar_name}}</h1>
                        </div>
                        @else
                            <div class="hover-content">
                                <h1>{{$Gallery->en_name}}</h1>
                            </div>
                        @endif
                    </a>
                </div>
                @endforeach
                @else
                        <h1 style="text-align: center">{{__('theme\home.no_gallery')}}</h1>
                    <hr>


                @endif
            </div>

        </div>
    </div>


@endsection
