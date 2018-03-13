@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
               Edit Treatment
            </div>
            <div class="panel-body">
                {!! Form::model($t,['action'=>['treatmentController@update',$t->id],'method'=>'patch']) !!}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label("Khmer Name") !!}
                            {!! Form::text('khname',null,['class'=>'edit-form-control text-blue','placeholder'=>'Khmer Name','required']) !!}
                            @if($errors->has('khname'))
                                <span class="text text-danger">{{$errors->first('khname')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label("English Name") !!}
                            {!! Form::text('engname',null,['class'=>'edit-form-control text-blue','placeholder'=>'English Name','required']) !!}
                            @if($errors->has('engname'))
                                <span class="text text-danger">{{$errors->first('engname')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label("Unit Price") !!}
                            {!! Form::number('unitPrice',null,['class'=>'edit-form-control text-blue','placeholder'=>'Unit Price','required','step'=>'any']) !!}
                            @if($errors->has('unitPrice'))
                                <span class="text text-danger">{{$errors->first('unitPrice')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label("Discount") !!}
                            {!! Form::number('dis',null,['class'=>'edit-form-control text-blue','min'=>'0','placeholder'=>'Discount (%)','step'=>'any']) !!}
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label("Treatment Type") !!}
                                {!! Form::select('treatmenttype_id',$treatType,null,['class'=>'edit-form-control text-blue height-35px','placeholder'=>'Please select treatment type..','required']) !!}
                            @if($errors->has('treatmenttype_id'))
                                <span class="text text-danger">{{$errors->first('treatmenttype_id')}}</span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkbox checkbox-primary">
                            {!! Form::checkbox('commission',null,$t->iscommision,['id'=>'commission']) !!}
                            <label for="commission">
                                Commission
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::button('Cancel',['class'=>'btn btn-danger btn-sm','onclick'=>'window.history.back()']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection

