{!! Form::model($staff,['action'=>['StaffController@update',$staff->id],'method'=>'PATCH','files'=>true]) !!}
<div class="col-md-10">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('Staff Name') !!}
                {!! Form::text('name',null,['class'=>'form-control border-radius','placeholder'=>'Staff name']) !!}
                @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('Contact') !!}
                {!! Form::text('contact',null,['class'=>'form-control border-radius','placeholder'=>'Phone number']) !!}
                @if($errors->has('contact'))
                    <span class="text-danger">{{$errors->first('contact')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">

            {!! Form::label('Gender') !!}
            <div class="form-group" style="margin-top: 2%">
                <div class="container">
                    <div class="radio-inline radio radio-primary">
                        @if($staff->gender=='M')
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
                        @if($staff->gender=='F')
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
                {!! Form::label('Level') !!}
                {!! Form::text('level',null,['class'=>'form-control border-radius','placeholder'=>'Level']) !!}
                @if($errors->has('level'))
                    <span class="text-danger">{{$errors->first('level')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('Email') !!}
                {!! Form::email('email',null,['class'=>'form-control border-radius','placeholder'=>'example@email.com']) !!}
                @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('Commission') !!}
                {!! Form::text('commission',null,['class'=>'form-control border-radius','placeholder'=>'Commission']) !!}
                @if($errors->has('commission'))
                    <span class="text-danger">{{$errors->first('commission')}}</span>
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
                <img src='{{asset("/photo/$staff->photo")}}' alt="" id="preViewEdit" style="height: 80px; width: 80px; border-radius: 50px; border: 2px solid #346895; padding: 2px;">
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
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::label('Base Salary') !!}
                {!! Form::text('baseSalary',null,['class'=>'form-control border-radius','placeholder'=>'Base salary']) !!}
                @if($errors->has('baseSalary'))
                    <span class="text-danger">{{$errors->first('baseSalary')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::label('Branch Name') !!}
                {!! Form::select('branch_id',$branch,null,['class'=>'form-control border-radius','placeholder'=>'Please select one' ]) !!}
                @if($errors->has('branch_id'))
                    <span class="text-danger">{{$errors->first('branch_id')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::label('Effect Date') !!}
                {!! Form::date('effectDate',null,['class'=>'form-control border-radius']) !!}
                @if($errors->has('effectDate'))
                    <span class="text-danger">{{$errors->first('effectDate')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::label('End Date') !!}
                {!! Form::date('endDate',null,['class'=>'form-control border-radius']) !!}
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
                {!! Form::label('Address') !!}
                {!! Form::textarea('address',null,['class'=>'form-control border-radius','rows'=>'3','placeholder'=>'Address']) !!}
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




