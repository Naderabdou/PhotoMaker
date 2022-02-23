@extends('dashboard.layout.Master')
@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{__('dashboard\home.order')}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>


        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>

                <th>{{__('dashboard\home.company')}}</th>
                <th>{{__('dashboard\home.type')}}</th>
                <th>{{__('dashboard\home.phone')}}</th>
                <th>{{__('dashboard\home.email')}}</th>
                <th>{{__('dashboard\home.image')}}</th>
                <th>{{__('dashboard\home.other')}}</th>
                <th>{{__('dashboard\home.number')}}</th>
                <th>{{__('dashboard\home.services')}}</th>
                <th>{{__('dashboard\home.Status')}}</th>



            </tr>
            </thead>
            <tbody>
            @foreach($contact as $contacts)
            <tr>
                <td>{{$contacts->company_name}}</td>
                <td>{{$contacts->type}}</td>
                <td>{{$contacts->phone}}</td>
                <td>{{$contacts->email}}</td>
                <td><img src="/storage/{{$contacts->file}}" style="height: 100px; width: 100px;"></td>
                <td>{{$contacts->other}}</td>
                <td>{{$contacts->photo}}</td>
                <td>
                    @foreach($contacts->ordercontact as $itme )
                        @for($i=0; $i<count($itme->services); $i++)


                            <li>
                                {{$itme->services[$i]}}
                            </li>


                        @endfor

                    @endforeach
                </td>

                    <td>
                        <form  action="{{route('status',$contacts->id)}}" method="POST" id="From-Status-{{$contacts->id}}" >
                            @csrf
                            <input type="hidden" name="id" value="{{$contacts-> id}}" />
                            <select class="form-select" aria-label="Default select example" onchange="this.form.submit()" name="status">
                                <option disabled selected>open this select</option>
                                <option value="active" {{$contacts->status == 'active' ? 'disabled selected' : ''}} >Active</option>
                                <option value="unactive"  {{$contacts->status == 'unactive' ? 'disabled selected' : ''}} >Un Active</option>

                            </select>

                            <br>

                        </form>
                        <br>
                        @if($contacts->status=='active')
                            <button type="button" class="btn btn-success">{{$contacts->status}}</button>
                        @endif
                        @if($contacts->status=='unactive')
                            <button type="button" class="btn btn-warning">{{$contacts->status}}</button>
                        @endif

                    </td>


            </tr>




            @endforeach

            </tbody>
        </table>
    </div>

@endsection
