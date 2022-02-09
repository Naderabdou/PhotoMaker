<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('dashboard\about.About')}}</h4>
        </div>
        <div class="modal-body">
            {!! Form::label('About Description AR') !!}
            {!! Form::text('about_desc_ar',null,['class'=>'form-control','placeholder'=>'write your About Description']) !!}
            @error('about_desc_ar')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('About Description EN') !!}
            {!! Form::text('about_desc_en',null,['class'=>'form-control','placeholder'=>'write your About Description']) !!}
            @error('about_desc_en')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>

        <div class="modal-body">
            {!! Form::label('Client Title ') !!}
            {!! Form::text('client_title',null,['class'=>'form-control','placeholder'=>'write your Client Title']) !!}
            @error('client_title')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('Client Img') !!}
            {!! Form::file('client_img',null,['class'=>'form-control']) !!}
            @error('client_img')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>



        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>
