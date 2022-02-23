@extends('dashboard.layout.Master')
@section('content')
    <!-- Trigger the modal with a button -->

    <div style="margin: 10px; ">
        <button style="border-radius: 50px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            {{__('dashboard\social.create')}}  <i class="icon-plus2"></i></button>

    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        {!! Form::open(['route' => 'slider.store' , 'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

        @csrf

        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{__('dashboard\social.title_social')}}</h4>
                </div>

                <div class="modal-body">
                    {!! Form::label(' :Image') !!}
                    {!! Form::file('img',null,['class'=>'form-control']) !!}
                    @error('img')
                    <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                    @enderror

                </div>

                <div class="modal-footer">
                    {!! Form::submit('Save'); !!}

                    {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

                </div>

            </div>

        </div>

        {!! Form::close() !!}

    </div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

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
                <th>{{__('dashboard\home.photo')}}</th>

                <th class="text-center">{{__('dashboard\social.Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=0
            @endphp
            @foreach($slider as $sliders)
                <tr>


                    <td>{{++$i}}</td>
                    <td><img src="/storage/{{$sliders->img}}" style="height: 100px; width: 100px;"></td>


                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="button"class="btn btn-primary"style="width:100px ;" data-toggle="modal" data-target="#edit{{$sliders->id}}"> {{__('dashboard\social.Edit')}} <i class="icon-database-edit2"></i></button></li>

                                    <li>
                                        <form action="{{route('slider.destroy',$sliders->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <button type="submit"class="btn btn-danger"style="width:100px ;">{{__('dashboard\social.Delete')}}  <i class="icon-database-remove"></i></button>
                                        </form>
                                    </li>



                                </ul>
                            </li>
                        </ul>
                    </td>

                </tr>
                <div id="edit{{$sliders->id}}" class="modal fade" role="dialog">
                    {!! Form::model($sliders, ['route' => ['slider.update', $sliders->id],'class'=>'form-horizontal','method'=>'PATCH','enctype'=>'multipart/form-data']) !!}

                    @csrf

                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{__('dashboard\social.title_social')}}</h4>
                            </div>

                            <div class="modal-body">
                                {!! Form::label(' :Image') !!}
                                {!! Form::file('img',null,['class'=>'form-control']) !!}
                                @error('img')
                                <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                                @enderror

                            </div>

                            <div class="modal-footer">
                                {!! Form::submit('Save'); !!}

                                {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

                            </div>

                        </div>

                    </div>


                    {!! Form::close() !!}

                </div>


            @endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable --



@endsection
