@extends('dashboard.layout.Master')
@section('content')
    <!-- Trigger the modal with a button -->

    <div style="margin: 10px; ">
        <button style="border-radius: 50px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            {{__('dashboard\about.create')}}  <i class="icon-plus2"></i></button>

    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        {!! Form::open(['route' => 'AboutAdmin.store' , 'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

        @csrf

        @include('dashboard\about.form')

        {!! Form::close() !!}

    </div>

    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{__('dashboard\about.About')}}</h5>
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
                <th>{{__('dashboard\about.about_desc_ar')}}</th>
                <th>{{__('dashboard\about.about_desc_en')}}</th>
                <th>{{__('dashboard\about.client_title')}}</th>
                <th>{{__('dashboard\about.client_img')}}</th>
                <th class="text-center">{{__('dashboard\social.Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=0
            @endphp
            @foreach($About as $Abouts)
                <tr>


                    <td>{{++$i}}</td>
                    <td>{{$Abouts->about_desc_ar}}</td>
                    <td>{{$Abouts->about_desc_en}}</td>

                    <td>{{$Abouts->client_title}}</td>
                    <td><img src="storage/{{$Abouts->client_img}}" style="height: 100px; width: 100px;"></td>

                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="button"class="btn btn-primary"style="width:100px ;" data-toggle="modal" data-target="#edit{{$Abouts->id}}"> {{__('dashboard\social.Edit')}} <i class="icon-database-edit2"></i></button></li>

                                    <li><a href="{{route('AboutAdmin.destroy',$Abouts->id )}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"class="btn btn-danger"style="width:100px ;">{{__('dashboard\social.Delete')}}  <i class="icon-database-remove"></i></button>  </a></li>

                                </ul>
                            </li>
                        </ul>
                    </td>

                </tr>
                <div id="edit{{$Abouts->id}}" class="modal fade" role="dialog">
                    {!! Form::model($Abouts, ['route' => ['AboutAdmin.update', $Abouts->id],'class'=>'form-horizontal','method'=>'PATCH','enctype'=>'multipart/form-data','file'=>true]) !!}

                    @csrf

                    @include('dashboard.about.form')

                    {!! Form::close() !!}

                </div>


            @endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable --



@endsection
