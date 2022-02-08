<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('dashboard\about.About')}}</h4>
        </div>
        <div class="modal-body">
            {!! Form::label('Title Ar ') !!}
            {!! Form::text('title_ar',null,['class'=>'form-control','placeholder'=>'write your Client Title']) !!}
            @error('title_ar')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('Title En ') !!}
            {!! Form::text('title_en',null,['class'=>'form-control','placeholder'=>'write your Client Title']) !!}
            @error('title_ar')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>

        <div class="modal-body">
            {!! Form::label('Description AR') !!}
            {!! Form::text('desc_ar',null,['class'=>'form-control','placeholder'=>'write your About Description']) !!}
            @error('desc_ar')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('Description EN') !!}
            {!! Form::text('desc_en',null,['class'=>'form-control','placeholder'=>'write your About Description']) !!}
            @error('desc_en')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>




        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>
