{!! Form::model($c,['action'=>['clientController@update',$c->id],'method'=>'patch']) !!}
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('khname','Khmer Name',['class'=>'edit-label']) !!}
            {!! Form::text('khname',null,['class'=>'edit-form-control text-blue bokor','id'=>'name', 'required','placeholder'=>'Khmer Name']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('engname','English Name',['class'=>'edit-label']) !!}
            {!! Form::text('engname',null,['class'=>'edit-form-control text-blue','id'=>'engname','required','placeholder'=>'English Name']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('gender','Gender',['class'=>'edit-label']) !!}<br>
            <div class="radio radio-primary radio-inline" style="margin-top: 9px;">
                {!! Form::radio('gender',1,null,['id'=>'Male','required']) !!}
                <label for="Male">
                    Male
                </label>
            </div>
            <div class="radio radio-primary radio-inline" style="margin-top: 9px;">
                {!! Form::radio('gender',0,null,['id'=>'female','required']) !!}
                <label for="female">
                    Female
                </label>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('occ','Occupation',['class'=>'edit-label']) !!}
            {!! Form::text('occ',null,['class'=>'edit-form-control text-blue','id'=>'occ','required','placeholder'=>'Occupation']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('tel','Cell Phone',['class'=>'edit-label']) !!}
            {!! Form::text('tel',null,['class'=>'edit-form-control text-blue','id'=>'tel','required','placeholder'=>'His/Her phone number']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('email','Email',['class'=>'edit-label']) !!}
            {!! Form::email('email',null,['class'=>'edit-form-control text-blue','id'=>'email','required','placeholder'=>'His/Her email address']) !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('dob','Date of Birth',['class'=>'edit-label']) !!}
            {!! Form::date('dob',null,['class'=>'edit-form-control text-blue','id'=>'dob','required',]) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('branch','Branch',['class'=>'edit-label']) !!}
            {!! Form::select('branch_id',$b,null,['class'=>'edit-form-control text-blue height-35px','required','id'=>'email','placeholder'=>'Please select branch...']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('addr','Address',['class'=>'edit-label']) !!}
            {!! Form::text('addr',null,['class'=>'edit-form-control text-blue','id'=>'dis','required','placeholder'=>'Current address']) !!}
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