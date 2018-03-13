{!! Form::model($tre,['action'=>'treatmentController@updateTreatmentType','method'=>'post','id'=>'edit']) !!}
        <input type="hidden" name="treatmentType_id" id="treatmentType_id" value="{{$tre->id}}">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('Khmer Name') !!}
                    {!! Form::text('khname',null,['class'=>'edit-form-control text-blue','required','placeholder'=>'Khmer Name','id'=>'khname']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('English Name') !!}
                    {!! Form::text('engname',null,['class'=>'edit-form-control text-blue','required','placeholder'=>'English Name','id'=>'engname']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {!! Form::submit('Update',['class'=>'btn btn-primary btn-sm']) !!}
                <a onclick="getFormCreate()" class="btn btn-danger btn-sm cursor-pointer">Cancel</a>
            </div>
        </div>
{!! Form::close() !!}