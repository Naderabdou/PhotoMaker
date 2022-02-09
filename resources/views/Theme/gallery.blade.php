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
            </div>

        </div>
    </div>


@endsection
