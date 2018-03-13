@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Prescription
            </div>
            <div class="panel-body">
                {!! Form::open(['id'=>'prescription']) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('Client') !!}
                                {!! Form::select('client_id',[],null,['class'=>'edit-form-control height-35px','placeholder'=>'Please choose client']) !!}
                            </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="form-group">
                               {!! Form::label('Treatment') !!}
                               {!! Form::select('treatment_id',[],null,['class'=>'edit-form-control height-35px','placeholder'=>'Please choose treatment']) !!}
                           </div>
                       </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Treatment') !!}
                                {!! Form::select('treatment_id',[],null,['class'=>'edit-form-control height-35px','placeholder'=>'Please choose treatment']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Medical') !!}
                                {!! Form::select('product_id',[],null,['class'=>'edit-form-control height-35px','placeholder'=>'Please choose medical']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Quantities') !!}
                                {!! Form::number('qty',null,['class'=>'edit-form-control height-35px','placeholder'=>'Please provide quantities','step'=>'any']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Unit Price') !!}
                                {!! Form::number('un',null,['class'=>'edit-form-control height-35px','placeholder'=>'unit price','step'=>'any']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('Description') !!}
                            {!! Form::textarea('des',null,['class'=>'edit-form-control','rows'=>'1','placeholder'=>'Enter your description']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::submit('Save',['class'=>'btn btn-success btn-sm','id'=>'submit']) !!}
                            <i class="fa fa-spinner fa-pulse fa-2x fa-fw" id="loading" style="display: none; "></i>

                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="panel-footer">

            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#prescription').submit(function (e) {
           e.preventDefault();
           var data = $('#prescription').serialize();
           $.ajax({
               type : 'post',
               url  : "{{route('prescription.store')}}",
               data : data,
               dataType : 'html',
               beforeSend:function () {
                   
                    $('#submit').css('display','none');
                    $('#loading').css('display','');
               },
               success:function (data) {
                    $('#submit').css('display','');
                    $('#loading').css('display','none');
               },
               error:function (error) {
                   console.log(error);
               }
           });
        });
    </script>
@endsection