
{!! Form::model($pri,['action'=>['PricelistController@update',$pri->id],'method'=>'PATCH']) !!}
<input type="hidden" value="{{csrf_token()}}">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('branch_id','&nbsp;Branch Name',['class'=>'edit-label']) !!}
            {!! Form::select('branch_id',$branch,null,['class'=>'edit-form-control height-35px text-blue','placeholder'=>'---Please select one---','required'=>true]) !!}
            @if($errors->has('branch_id'))
                <span class="text-danger">
                                    {{$errors->first('branch_id')}}
                                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('product_id','&nbsp;Product Name',['class'=>'edit-label required']) !!}
            {!! Form::select('product_id',$pro,null,['class'=>'edit-form-control height-35px text-blue','required'=>true,'placeholder'=>'---Please select one---']) !!}
            @if($errors->has('product_id'))
                <span class="text-danger">
                                                {{$errors->first('product_id')}}
                                            </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('fobPrice','&nbsp;Fob Price',['class'=>'edit-label required']) !!}
            {!! Form::text('fobPrice',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('fobPrice'))
                <span class="text-danger">
                                                    {{$errors->first('fobPrice')}}
                                                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('margin','&nbsp;Margin',['class'=>'edit-label required']) !!}
            {!! Form::text('margin',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('margin'))
                <span class="text-danger">
                                    {{$errors->first('margin')}}
                                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('landingPrice','&nbsp;Landing Price',['class'=>'edit-label required']) !!}
            {!! Form::text('landingPrice',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('landingPrice'))
                <span class="text-danger">
                                    {{$errors->first('landingPrice')}}
                                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('sellingPrice','&nbsp;Selling Price',['class'=>'edit-label required']) !!}
            {!! Form::text('sellingPrice',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('sellingPrice'))
                <span class="text-danger">
                                                    {{$errors->first('sellingPrice')}}
                                                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('beginDate','&nbsp;Begin Date',['class'=>'edit-label required']) !!}
            {!! Form::date('beginDate',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('beginDate'))
                <span class="text-danger">
                                                    {{$errors->first('beginDate')}}
                                                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('endDate','&nbsp;End Date',['class'=>'edit-label required']) !!}
            {!! Form::date('endDate',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
            @if($errors->has('endDate'))
                <span class="text-danger">
                                    {{$errors->first('endDate')}}
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