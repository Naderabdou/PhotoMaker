@extends('Theme.master')


@section('content')
    <!--===============================
    CONTENT
===================================-->

    <div class="fixed-bg">
        <img src="/theme/images/1.jpg">
    </div>


    <div class="main-content">
        <div class="container">
            <h1 class="main-heading">{{__('Theme\home.services')}}</h1>

               @if(isset($Service) && count($Service)>0)


                @foreach($Service as $Services)
                    @if(app()->getLocale()=='ar')
                        <div class="border-bottom">
                            <h1><strong>{{$Services->title_ar}}</strong></h1>
                            <p>{{$Services->desc_ar}}</p>

                        </div>
                    @else
                        <div class="border-bottom">
                            <h1><strong>{{$Services->title_en}}</strong></h1>
                            <p>{{$Services->desc_en}}</p>

                        </div>

                    @endif

                @endforeach


            @else
                <div class="border-bottom">
                    <h1><strong>{{__('Theme\home.empty')}}</strong></h1>
                </div>
            @endif






        </div>
    </div>


@endsection
