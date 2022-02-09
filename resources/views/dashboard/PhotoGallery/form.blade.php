<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('dashboard\photocategory.galleryCate')}}</h4>
        </div>


        <div class="modal-body">
            {!! Form::label(' :Image Category') !!}
            {!! Form::file('image',null,['class'=>'form-control']) !!}
            @error('image')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
<hr>
        <div class="modal-body">
            {!! Form::label('gallery_id',' :Category Name ') !!}<br>
            {!! Form::select('gallery_id',$categories,null,['class'=>'form-control']) !!}
            @error('gallery_id')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>





        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>
