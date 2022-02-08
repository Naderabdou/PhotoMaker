@extends('dashboard.layout.Master')
@section('content')
    <!-- Trigger the modal with a button -->

    <div style="margin: 10px; ">
        <button style="border-radius: 50px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            {{__('dashboard\social.create')}}  <i class="icon-plus2"></i></button>

    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        {!! Form::open(['route' => 'social.store' , 'method'=>'post','class'=>'form-horizontal']) !!}

        @csrf

        @include('dashboard\social.form')

        {!! Form::close() !!}

    </div>

    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{__('dashboard\social.title_social')}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>



        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>{{__('dashboard\social.Id')}}</th>
                <th>{{__('dashboard\social.facebook')}}</th>
                <th>{{__('dashboard\social.twitter')}}</th>
                <th>{{__('dashboard\social.github')}}</th>
                <th class="text-center">{{__('dashboard\social.Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=0
            @endphp
            @foreach($social as $socials)
                <tr>


                    <td>{{++$i}}</td>
                    <td>{{$socials->facebook_url}}</td>
                    <td>{{$socials->twitter_url}}</td>
                    <td>{{$socials->github_url}}</td>

                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="button"class="btn btn-primary"style="width:100px ;" data-toggle="modal" data-target="#edit{{$socials->id}}"> {{__('dashboard\social.Edit')}} <i class="icon-database-edit2"></i></button></li>

                                    <li><a href="{{route('social.destroy',$socials->id )}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"class="btn btn-danger"style="width:100px ;">{{__('dashboard\social.Delete')}}  <i class="icon-database-remove"></i></button>  </a></li>

                                </ul>
                            </li>
                        </ul>
                    </td>

                </tr>
                <div id="edit{{$socials->id}}" class="modal fade" role="dialog">
                    {!! Form::model($socials, ['route' => ['social.update', $socials->id],'class'=>'form-horizontal','method'=>'PATCH']) !!}

                    @csrf

                    @include('dashboard.social.form')

                    {!! Form::close() !!}

                </div>


            @endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable --



@endsection
