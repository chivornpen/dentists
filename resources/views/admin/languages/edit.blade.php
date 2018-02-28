<div class="modal-dialog modal-sm" role="document">
    <div class="panel panel-default">
        <div class="panel-heading bokor">
            {{trans('label.edit')}}
        </div>
        {!! Form::model($lang,['action'=>['LanguageController@update',$lang->id],'method'=>'PATCH']) !!}
        <div class="panel-body">
            <label class="bokor">{{trans('label.language_code')}}</label>
            {!! Form::text('code',null,['class'=>'edit-form-control','required'=>true]) !!}

            <label class="bokor">{{trans('label.language_name')}}</label>
            {!! Form::text('name',null,['class'=>'edit-form-control'])!!}

        </div>
        <div class="panel-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm']) !!}
            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>