{!! Form::model($b,['action'=>['branchController@update',$b->id],'method'=>'patch']) !!}
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('name','Branch Name',['class'=>'edit-label']) !!}
            {!! Form::text('name',null,['class'=>'edit-form-control text-blue','required'=>'true','id'=>'name']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('branchlocal','Branch Local',['class'=>'edit-label']) !!}
            {!! Form::text('branchNameLocal',null,['class'=>'edit-form-control text-blue','required','id'=>'branchlocal']) !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('shortname','Short Name',['class'=>'edit-label']) !!}
            {!! Form::text('branchShortName',null,['class'=>'edit-form-control text-blue','required','id'=>'shortname']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('pCode','Postal Code',['class'=>'edit-label']) !!}
            {!! Form::number('pCode',null,['class'=>'edit-form-control text-blue','required','min'=>0,'id'=>'pocode']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <div class="checkbox checkbox-success">

                {!! Form::checkbox('leadBranch',null,null,['id'=>'leadbranch']) !!}
                <label for="leadbranch" class="edit-label">
                    Head Branch
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {!! Form::submit('Update',['class'=>'btn btn-primary btn-sm']) !!}
        {!! Form::button('Cancel',['class'=>'btn btn-danger btn-sm','onclick'=>'refresh()']) !!}
    </div>
</div>
{!! Form::close() !!}