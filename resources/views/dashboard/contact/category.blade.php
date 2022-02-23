@extends('dashboard.layout.Master')
@section('content')
    <!-- Trigger the modal with a button -->

    <div style="margin: 10px; ">
        <button style="border-radius: 50px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            {{__('dashboard\about.create')}}  <i class="icon-plus2"></i></button>

    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        {!! Form::open(['route' => 'categoryContact.store' , 'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

        @csrf

        @include('dashboard.contact.categoryform')

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
            <h5 class="panel-title">{{__('dashboard\home.contact')}}</h5>
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
                <th>{{__('dashboard\photocategory.ar_name')}}</th>
                <th>{{__('dashboard\photocategory.en_name')}}</th>
                <th class="text-center">{{__('dashboard\social.Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=0
            @endphp
            @foreach($category as $categories)`
                <tr>


                    <td>{{++$i}}</td>
                    <td>{{$categories->name_ar}}</td>
                    <td>{{$categories->name_en}}</td>





                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="button"class="btn btn-primary"style="width:100px ;" data-toggle="modal" data-target="#edit{{$categories->id}}"> {{__('dashboard\social.Edit')}} <i class="icon-database-edit2"></i></button></li>
                                    <form action="{{route('categoryContact.destroy',$categories->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <button type="submit"class="btn btn-danger"style="width:100px ;">{{__('dashboard\social.Delete')}}  <i class="icon-database-remove"></i></button>
                                    </form>

                                </ul>
                            </li>
                        </ul>
                    </td>

                </tr>
                <div id="edit{{$categories->id}}" class="modal fade" role="dialog">
                    {!! Form::model($categories, ['route' => ['categoryContact.update', $categories->id],'class'=>'form-horizontal','method'=>'PATCH','enctype'=>'multipart/form-data','file'=>true]) !!}

                    @csrf

                    @include('dashboard.contact.categoryform')

                    {!! Form::close() !!}

                </div>


            @endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable --



@endsection
