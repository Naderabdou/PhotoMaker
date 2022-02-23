<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('dashboard\home.contact')}}</h4>
        </div>

        <div class="modal-body">
            {!! Form::label('Services_Ar') !!}
            {!! Form::text('name_ar[]',null,['class'=>'form-control','placeholder'=>'write your Services Ar']) !!}
            @error('name_ar')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <button style="margin: 20px"  class="btn btn-success" id="create" onclick="create">Create Services</button>

        <div class="modal-body">
            {!! Form::label('Services_En') !!}
            {!! Form::text('name_en[]',null,['class'=>'form-control','placeholder'=>'write your Services En']) !!}
            @error('name_en')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>
        <div id="div" class="modal-body" style="display: none">

        </div>
        <div id="diven" class="modal-body" style="display: none">

        </div>

        <div class="modal-body">
            {!! Form::label('contact_id',' :Category Name ') !!}<br>
            {!! Form::select('contact_id',$categories,null,['class'=>'form-control']) !!}
            @error('contact_id')
            <div class="alert alert-danger my-2" role="alert">{{$message}}</div>
            @enderror

        </div>






        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>
