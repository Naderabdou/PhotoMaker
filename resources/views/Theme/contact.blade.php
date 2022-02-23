@extends('Theme.master')


@section('css')
    <style>
        input[type="file"] {
            padding: 0;
        }

        .black-box.margin-bottom {
            margin: 0 0 15px;
        }

        .checkbox-holder {
            font-weight: 100;
            position: relative;
            cursor: pointer;
            margin-bottom: 10px;
            display: block;
        }

        .checkbox-holder span {
            vertical-align: middle;
        }

        .checkbox-holder .checkbox-icon {
            width: 13px;
            height: 13px;
            line-height: 7px;
            display: inline-block;
            border: 1px solid #000;
            background: #000;
            text-align: center;
            margin: 0 4px;
        }

        .checkbox-holder input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkbox-holder .checkbox-icon:after {
            content: '';
            background: #000;
            width: 7px;
            height: 7px;
            display: block;
            margin: 2px;
        }

        .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon {
            border-color: #00bcd4;
        }

        .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon:after {
            background: #00bcd4;
        }

        .main-label {
            border-bottom: 1px dashed #00bcd4;
        }

        .check-open {
            margin-top: 10px;
        }
    </style>

@endsection
@section('js')
    <script>
        $(document).ready(function (){

            $('.check-open').slideUp(0);

            $('.main-label .checkbox-holder').click(function (){
                if($(this).find('input').is(':checked')) {
                    $(this).parents('.main-label').next('.check-open').stop().slideDown();
$('input[name="services_id[]"]').prop('checked',false)
                } else {
                    $(this).parents('.main-label').next('.check-open').stop().slideUp();
                }
            });
        });
        function checkbox(checkbox) {
            console.log(checkbox)
            let category = document.getElementsByName('category_id')
            for (let i=0; i<category.length; i++){
                if(category[i]!==checkbox){
                    category[i].checked=false;
                }
            }



        }






        function otherServices() {
            // Get the checkbox
            var checkBox = document.getElementById("other");
            // Get the output text
            var text = document.getElementById("other_service");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }


    </script>


@endsection

@section('content')
    <!--===============================
    CONTENT
===================================-->

    <div class="fixed-bg">
        <img src="/theme/images/1.jpg">
    </div>


    <div  class="main-content">
        <div class="container">
            <h1 class="main-heading">{{__('theme\home.contact')}}</h1>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    @if(app()->getLocale()=='ar')
                               {{-- start  form arabic --}}
                    <form action="{{route('data.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="الاسم / الشركة" name="company_name">
                        @error('company_name')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror
                        <input type="text" placeholder="نوع النشاط" name="type">
                        @error('type')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror
                        <input type="tel" placeholder="رقم التواصل" name="phone">
                        @error('phone')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror
                        <input type="email" placeholder="البريد الإلكتروني" name="email">
                        @error('email')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror


                        <label>{{__('theme\home.service_type')}}</label>

                        <div class="row">
                            @foreach($category as $categoies)

                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="box black-box margin-bottom">
                                    <div class="main-label">
                                        <label class="checkbox-holder">
                                            <input type="checkbox"  name="category_id" value="{{$categoies->id}}" onclick="checkbox(this)">
                                            <span class="checkbox-icon"></span>
                                            <span>{{$categoies->name_ar}}</span>



                                        </label>
                                        @error('category_id')
                                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                                        @enderror

                                    </div>


                                    <div class="check-open">
                                     @foreach($categoies->Services as $services)
                                        <label class="checkbox-holder">
                                            <input type="checkbox"   name="services_id[]"  @if(app()->getLocale()=='ar') value="{{$services->name_ar}}" @else value="{{$services->name_en}} @endif  ">
                                            <span class="checkbox-icon"></span>
                                            @if(app()->getLocale()=='ar')
                                            <span>{{$services->name_ar}}</span>
                                            @else
                                                <span>{{$services->name_en}}</span>
                                            @endif



                                        </label>


                                        @endforeach
                                         <label class="checkbox-holder">
                                             <input type="checkbox" onclick="otherServices()" id="other">
                                             <span class="checkbox-icon"></span>
                                             <span> (يرجى التحديد )أخرى </span>
                                         </label>

                                         <input type="text" placeholder="" name="other" id="other_service" style="display:none">
                                         @error('other')
                                         <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                                         @enderror

                                         <label>عدد الصور</label>
                                         <input type="number" placeholder="عدد الصور" name="photo">
                                         @error('photo')
                                         <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                                         @enderror







                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>


                        <label>{{__('theme\home.Attach')}}</label>
                        <input type="file" placeholder="إرفاق ملف" name="file">
                        @error('file')
                        <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                        @enderror

                        <button  class="btn btn-primary btn-block">

                            <span>ارسال</span>


                        </button>
                    </form>
                                    {{--end form--}}






                    {{-- else--}}
                    @else
                                 {{-- start  form english --}}
                        <form action="{{route('data.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" placeholder="Name / Company" name="company_name">
                            @error('company_name')
                            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                            @enderror
                            <input type="text" placeholder="Activity type" name="type">
                            @error('type')
                            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                            @enderror
                            <input type="tel" placeholder="phone number" name="phone">
                            @error('phone')
                            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                            @enderror
                            <input type="email" placeholder="E-mail" name="email">

                            @error('email')
                            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                            @enderror




                            <label>{{__('theme\home.service_type')}}</label>

                            <div class="row">
                                @foreach($category as $categoies)

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="box black-box margin-bottom">
                                            <div class="main-label">
                                                <label class="checkbox-holder">
                                                    <input type="checkbox"  name="category_id" value="{{$categoies->id}}" onclick="checkbox(this)">
                                                    <span class="checkbox-icon"></span>
                                                    <span>{{$categoies->name_ar}}</span>



                                                </label>
                                                @error('category_id')
                                                <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                                                @enderror

                                            </div>


                                            <div class="check-open">
                                                @foreach($categoies->Services as $services)
                                                    <label class="checkbox-holder">
                                                        <input type="checkbox"   name="services_id[]"  @if(app()->getLocale()=='ar') value="{{$services->name_ar}}" @else value="{{$services->name_en}} @endif  ">
                                                        <span class="checkbox-icon"></span>
                                                        @if(app()->getLocale()=='ar')
                                                            <span>{{$services->name_ar}}</span>
                                                        @else
                                                            <span>{{$services->name_en}}</span>
                                                        @endif



                                                    </label>


                                                @endforeach
                                                <label class="checkbox-holder">
                                                    <input type="checkbox" id="other" onclick="otherServices()">
                                                    <span class="checkbox-icon"></span>
                                                    <span> {{__('theme\home.other')}} </span>
                                                </label>

                                                <input type="text" placeholder="" name="other" id="other_service"  style="display:none">
                                                @error('other')
                                                <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                                                @enderror

                                                <label>{{__('theme\home.number_photos')}}</label>
                                                <input type="number" placeholder="photos number" name="photo">
                                                @error('photo')
                                                <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                                                @enderror







                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>


                            <label>{{__('theme\home.Attach')}}</label>
                            <input type="file" placeholder="إرفاق ملف" name="file">
                            @error('file')
                            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
                            @enderror
                            <button  class="btn btn-primary btn-block">

                                    <span>Send</span>


                            </button>
                        </form>
                                  {{--end form--}}

                    @endif

                </div>





                <div class="col-xs-12 col-sm-4">
                    <div class="box black-box text-center">
                        <h3 class="main-heading">{{__('theme\home.info')}}</h3>

                        <p><i class="fa fa-envelope-o right-fa"></i> Info@pmstu.com</p>
                        <p><i class="fa fa-phone right-fa"></i> 0123456789</p>
                    </div>
                    <div class="box black-box text-center">
                        <h3 class="main-heading">{{__('theme\home.Subscribe')}}</h3>
                     @if(app()->getLocale()=='ar')
                        <form>
                            <input type="email" placeholder="بريدك الالكتروني">
                            <div class="btn btn-white btn-block">
                                <span><input type="submit" value="إشترك معنا"></span>
                            </div>
                        </form>
                        @else
                            <form>
                                <input type="email" placeholder="E-mail">
                                <div class="btn btn-white btn-block">
                                    <span><input type="submit" value="Subscribe"></span>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>

            </div>

        </div>
    </div>




@endsection
