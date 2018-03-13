@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div id="message"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Treatment
            </div>
            <div class="panel-body">
                {!! Form::open(['id'=>'treatment']) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label("Khmer Name") !!}
                                {!! Form::text('khname',null,['class'=>'edit-form-control text-blue','placeholder'=>'Khmer Name','required']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label("English Name") !!}
                                {!! Form::text('engname',null,['class'=>'edit-form-control text-blue','placeholder'=>'English Name','required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label("Unit Price") !!}
                                {!! Form::number('unit',null,['class'=>'edit-form-control text-blue','placeholder'=>'Unit Price','required','step'=>'any']) !!}
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
                                <div class="input-group">
                                    {!! Form::select('treatmenttype',$treatType,null,['class'=>'form-control text-blue height-35px','placeholder'=>'Please select treatment type..','style'=>'border-bottom-left-radius:5px; border-top-left-radius:5px ;','required']) !!}
                                    <span class="input-group-btn"><a href="{{route('treatment.index')}}" class="btn btn-warning"><i class="fa fa-plus fa-fw" style="color: #0b93d5"></i></a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkbox checkbox-primary">
                                {!! Form::checkbox('commission',null,null,['id'=>'commission']) !!}
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
                                {!! Form::submit('Create',['class'=>'btn btn-success btn-sm']) !!}
                                {!! Form::reset('Clear',['class'=>'btn btn-danger btn-sm']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <hr>
            <div class="panel-body">
                <div id="treatmentView">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#treatment').submit(function (e) {
            e.preventDefault();
            var data = $('#treatment').serialize();
            $.ajax({
               type : 'post',
               url  : "{{route('treatment.store')}}",
               data : data,
               dataType : 'html',
               success:function (data) {
                   getCurrentCreate();
                   $('#message').html(data);
                   $('#message').fadeIn('slow');
                   setInterval(function () {
                       $('#message').fadeOut('slow');
                   },6000);
               }
            });
        });
        $(document).ready(function () {
            getCurrentCreate();
        });
        function getCurrentCreate() {
            $.ajax({
                type : 'get',
                url  : "{{url('/treatment/view/current/create')}}",
                dataType : 'html',
                success:function (data) {
                    $('#treatmentView').html(data);
                    $('#treatmentViewTableCurrent').DataTable();
                }
            });
        }
    </script>
@endsection