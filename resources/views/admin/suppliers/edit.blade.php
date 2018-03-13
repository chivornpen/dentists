
{!! Form::model($sup,['action'=>['SupplyController@update',$sup->id],'method'=>'PATCH']) !!}
<input type="hidden" value="{{csrf_token()}}">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('companyKhName','&nbsp;Company Khmer Name',['class'=>'edit-label required']) !!}
            {!! Form::text('companyKhName',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('companyKhName'))
                <span class="text-danger">
                                        {{$errors->first('companyKhName')}}
                                    </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('companyEnName','&nbsp;Company English Name',['class'=>'edit-label required']) !!}
            {!! Form::text('companyEnName',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('companyEnName'))
                <span class="text-danger">
                                        {{$errors->first('companyEnName')}}
                                    </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('zipCode','&nbsp;Zip Code',['class'=>'edit-label']) !!}
            {!! Form::text('zipCode',null,['class'=>'edit-form-control text-blue'])!!}
            @if($errors->has('zipCode'))
                <span class="text-danger">
                                        {{$errors->first('zipCode')}}
                                    </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('personalName','&nbsp;Personal Name',['class'=>'edit-label required']) !!}
            {!! Form::text('personalName',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('personalName'))
                <span class="text-danger">
                                        {{$errors->first('personalName')}}
                                    </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('email','&nbsp;Email',['class'=>'edit-label required']) !!}
            {!! Form::email('email',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('email'))
                <span class="text-danger">
                                    {{$errors->first('email')}}
                                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('personalContact','&nbsp;Personal Contact',['class'=>'edit-label required']) !!}
            {!! Form::text('personalContact',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('personalContact'))
                <span class="text-danger">
                                    {{$errors->first('personalContact')}}
                                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('location','&nbsp;Location',['class'=>'edit-label']) !!}
            {!! Form::text('location',null,['class'=>'edit-form-control text-blue'])!!}
            @if($errors->has('location'))
                <span class="text-danger">
                                        {{$errors->first('location')}}
                                    </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('branch_id','&nbsp;Branch Name',['class'=>'edit-label required']) !!}
            {!! Form::select('branch_id',$branch,null,['class'=>'edit-form-control height-35px text-blue','placeholder'=>'---Please select one---','required'=>true]) !!}
            @if($errors->has('branch_id'))
                <span class="text-danger">
                                    {{$errors->first('branch_id')}}
                                </span>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::submit('Update',['class'=>'btn btn-primary btn-sm' ]) !!}
    <a onclick="cancel()" class="btn btn-danger btn-sm cursor-pointer">Cancel</a>
    <a href="{{URL::to('/')}}" class="btn btn-default btn-sm">Close</a>
</div>

</div>
{!! Form::close() !!}