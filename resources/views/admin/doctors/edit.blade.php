{!! Form::model($doctor,['action'=>['DoctorController@update',$doctor->id],'method'=>'PATCH','files'=>true]) !!}
<div class="col-md-10">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('name','Doctor Name',['class'=>'edit-label required']) !!}
                {!! Form::text('name',null,['class'=>'edit-form-control text-blue','placeholder'=>'Doctor name','required'=>'true']) !!}
                @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('contact','Contact',['class'=>'edit-label required']) !!}
                {!! Form::text('contact',null,['class'=>'edit-form-control text-blue','placeholder'=>'Phone number','required'=>'true']) !!}
                @if($errors->has('contact'))
                    <span class="text-danger">{{$errors->first('contact')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">

            {!! Form::label('Gender') !!}
            <div class="form-group" style="margin-top: 2%">
                    <div class="radio-inline radio radio-primary">
                        @if($doctor->gender=='M')
                        <input type="radio" name="gender" id="male" value="M" checked>
                        <label for="male">
                            Male
                        </label>
                        @else
                            <input type="radio" name="gender" id="male" value="M">
                            <label for="male">
                                Male
                            </label>
                        @endif
                    </div>
                    <div class="radio-inline radio radio-success">
                        @if($doctor->gender=='F')
                            <input type="radio" name="gender" id="female" value="F" checked>
                            <label for="female">
                                Female
                            </label>
                        @else
                            <input type="radio" name="gender" id="female" value="F">
                            <label for="female">
                                Female
                            </label>
                        @endif
                    </div>
                @if($errors->has('gender'))
                    <span class="text-danger">{{$errors->first('gender')}}</span>
                @endif
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('level','Level',['class'=>'edit-label required']) !!}
                {!! Form::text('level',null,['class'=>'edit-form-control text-blue','placeholder'=>'Level','required'=>'true']) !!}
                @if($errors->has('level'))
                    <span class="text-danger">{{$errors->first('level')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('grade','Grade',['class'=>'edit-label required']) !!}
                {!! Form::text('grade',null,['class'=>'edit-form-control text-blue','placeholder'=>'Grade','required'=>'true']) !!}
                @if($errors->has('grade'))
                    <span class="text-danger">{{$errors->first('grade')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('section_id','&nbsp;Section',['class'=>'edit-label required']) !!}
                <div class="input-group">
                    {!! Form::select('section_id',$section,null,['class'=>'form-control section_id','placeholder'=>'---Please select one---', 'id'=>'section_id','required'=>'true','style'=>'border-bottom-left-radius: 5px; border-top-left-radius: 5px;']) !!}
                    <span class="input-group-btn">
                                                <button class="btn btn-secondary" data-toggle="modal" data-target="#section" onclick="addSec()" type="button"><i class="fa fa-plus fa-fw" style="color: #0b93d5"></i></button>
                                        </span>
                </div>
                @if($errors->has('section_id'))
                    <span class="text-danger">{{$errors->first('section_id')}}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="col-md-2">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-xs-5 col-sm-2">
            <div class="form-group">
                <img src='{{asset("/photo/$doctor->photo")}}' alt="" id="preViewEdit" style="height: 80px; width: 80px; border-radius: 50px; border: 2px solid #346895; padding: 2px;">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-lg-8">
            <div class="form-group">
                <label for="imageEdit" class="btn btn-primary" style="padding: 4px 16px;">Browse</label>
                <input type="file" name="imageEdit" class="edit-form-control" id="imageEdit" onchange="loadFileEdit(event)" accept="image/*"style="display: none;">
                {{--{!! Form::file('image',['class'=>'btn display-none']) !!}--}}
                @if($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('email','Email',['class'=>'edit-label required']) !!}
                {!! Form::email('email',null,['class'=>'edit-form-control text-blue','placeholder'=>'example@email.com','required'=>'true']) !!}
                @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('commission','Commission',['class'=>'edit-label required']) !!}
                {!! Form::text('commission',null,['class'=>'edit-form-control text-blue','placeholder'=>'Commission','required'=>'true']) !!}
                @if($errors->has('commission'))
                    <span class="text-danger">{{$errors->first('commission')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('baseSalary','Base Salary',['class'=>'edit-label required']) !!}
                {!! Form::text('baseSalary',null,['class'=>'edit-form-control text-blue','placeholder'=>'Base salary','required'=>'true']) !!}
                @if($errors->has('baseSalary'))
                    <span class="text-danger">{{$errors->first('baseSalary')}}</span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('branch_id','Branch Name',['class'=>'edit-label']) !!}
                {!! Form::select('branch_id',$branch,null,['class'=>'edit-form-control height-35px text-blue','placeholder'=>'Please select one' ]) !!}
                @if($errors->has('branch_id'))
                    <span class="text-danger">{{$errors->first('branch_id')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('effectDate','Effect Date',['class'=>'edit-label required']) !!}
                {!! Form::date('effectDate',null,['class'=>'edit-form-control text-blue','required'=>'true']) !!}
                @if($errors->has('effectDate'))
                    <span class="text-danger">{{$errors->first('effectDate')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('endDate','End Date',['class'=>'edit-label required']) !!}
                {!! Form::date('endDate',null,['class'=>'edit-form-control text-blue','required'=>'true']) !!}
                @if($errors->has('endDate'))
                    <span class="text-danger">{{$errors->first('endDate')}}</span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('address','Address',['class'=>'edit-label']) !!}
                {!! Form::textarea('address',null,['class'=>'edit-form-control text-blue','rows'=>'2','placeholder'=>'Address']) !!}
                @if($errors->has('address'))
                    <span class="text-danger">{{$errors->first('address')}}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::submit('Update',['class'=>'btn btn-primary btn-sm' ]) !!}
                <a href="#" onclick="cancel()" class="btn btn-danger btn-sm">Cancel</a>
                <a href="{{URL::to('/')}}" class="btn btn-default btn-sm">Close</a>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script type="text/javascript">
    var loadFileEdit = function(event) {
        var output = document.getElementById('preViewEdit');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>




