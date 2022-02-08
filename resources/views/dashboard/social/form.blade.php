<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('dashboard\social.title_social')}}</h4>
        </div>
        <div class="modal-body">
            {!! Form::label('Facebook URL','Facebook') !!}
            {!! Form::text('facebook_url',null,['class'=>'form-control','placeholder'=>'write your Facebook url']) !!}
            @error('facebook_url')
            <div class="alert alert-danger my-2" role="alert">{{__('dashboard\social.failed_facebook')}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('Twitter URL','Twitter') !!}
            {!! Form::text('twitter_url',null,['class'=>'form-control','placeholder'=>'write your Twitter url']) !!}
            @error('twitter_url')
            <div class="alert alert-danger my-2" role="alert">{{__('dashboard\social.failed_twitter')}}</div>
            @enderror

        </div>
        <div class="modal-body">
            {!! Form::label('Github url','Github') !!}
            {!! Form::text('github_url',null,['class'=>'form-control','placeholder'=>'write your Github url']) !!}
            @error('github_url')
            <div class="alert alert-danger my-2" role="alert">{{__('dashboard\social.failed_github')}}</div>
            @enderror

        </div>


        <div class="modal-footer">
            {!! Form::submit('Save'); !!}

            {!! Form::submit('close',[ 'data-dismiss'=>'modal']); !!}

        </div>

    </div>

</div>
