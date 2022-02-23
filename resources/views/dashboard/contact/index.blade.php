@extends('dashboard.layout.Master')
@section('js')




    <script>

    document.getElementById('create').addEventListener('click',function (e){

        e.preventDefault();
        let div =document.getElementById('div')
        div.style.display='block'
        let input= document.createElement('input')

        let label= document.createElement('label')
        label.setAttribute('for','name_ar')
        label.innerHTML='Services ar'
        input.setAttribute('name','name_ar[]');
        input.setAttribute('class','form-control')

        let inputen= document.createElement('input')
        let labelen= document.createElement('label')
        labelen.setAttribute('for','name_en')
        labelen.innerHTML='Services en'
        inputen.setAttribute('name','name_en[]');
        inputen.setAttribute('class','form-control')





        div.appendChild(label)
        div.appendChild(input)
        div.appendChild(labelen)
        div.appendChild(inputen)




    })

    </script>
@endsection
@section('content')
    <!-- Trigger the modal with a button -->

    <div style="margin: 10px; ">
        <button style="border-radius: 50px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            {{__('dashboard\about.create')}}  <i class="icon-plus2"></i></button>

    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        {!! Form::open(['route' => 'contact.store' , 'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

        @csrf

        @include('dashboard.contact.form')

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
                <th>{{__('dashboard\home.services_en')}}</th>
                <th>{{__('dashboard\home.services_ar')}}</th>

                <th class="text-center">{{__('dashboard\social.Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=0
            @endphp
            @foreach($contact as $contacts)`
                <tr>


                    <td>{{++$i}}</td>
                    <td>{{$contacts->ServicesCate->name_ar}}</td>
                    <td>{{$contacts->ServicesCate->name_en}}</td>
                   <td>{{$contacts->name_ar}}</td>
                    <td>{{$contacts->name_en}}</td>









                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="button"class="btn btn-primary"style="width:100px ;" data-toggle="modal" data-target="#edit{{$contacts->id}}"> {{__('dashboard\social.Edit')}} <i class="icon-database-edit2"></i></button></li>
                                    <form action="{{route('contact.destroy',$contacts->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <button type="submit"class="btn btn-danger"style="width:100px ;">{{__('dashboard\social.Delete')}}  <i class="icon-database-remove"></i></button>
                                    </form>

                                </ul>
                            </li>
                        </ul>
                    </td>

                </tr>
                <div id="edit{{$contacts->id}}" class="modal fade" role="dialog">
                    {!! Form::model($contacts, ['route' => ['contact.update', $contacts->id],'class'=>'form-horizontal','method'=>'PATCH','enctype'=>'multipart/form-data','file'=>true]) !!}

                    @csrf

                    @include('dashboard.contact.form')

                    {!! Form::close() !!}

                </div>


            @endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable --



@endsection
