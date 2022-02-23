<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('dashboard\home.contact')}}</h4>
        </div>
        <div class="modal-body">
            {!! Form::label('Category Name AR') !!}
            {!! Form::text('name_ar',null,['class'=>'form-control','placeholder'=>'write your Category Name AR']) !!}
            @error('name_ar')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('Category Name EN') !!}
            {!! Form::text('name_en',null,['class'=>'form-control','placeholder'=>'write your Category Name EN']) !!}
            @error('name_en')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>





        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>
