<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('dashboard\photocategory.galleryCate')}}</h4>
        </div>
        <div class="modal-body">
            {!! Form::label('Category Name AR') !!}
            {!! Form::text('ar_name',null,['class'=>'form-control','placeholder'=>'write your Category Name AR']) !!}
            @error('ar_name')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('Category Name EN') !!}
            {!! Form::text('en_name',null,['class'=>'form-control','placeholder'=>'write your Category Name EN']) !!}
            @error('en_name')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>

        <div class="modal-body">
            {!! Form::label('Image Category') !!}
            {!! Form::file('image',null,['class'=>'form-control']) !!}
            @error('image')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>



        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>
