@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Branch
            </div>

            <div class="panel-body">
                {!! Form::open(['method'=>'post','id'=>'branch']) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('Branch Name') !!}
                                {!! Form::text('name',null,['class'=>'edit-form-control','required'=>'true','id'=>'name']) !!}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('Branch Local') !!}
                                {!! Form::text('branchlocal',null,['class'=>'edit-form-control','required','id'=>'branchlocal']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('Short Name') !!}
                                {!! Form::text('shortname',null,['class'=>'edit-form-control','required','id'=>'shortname']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('Postal Code') !!}
                                {!! Form::number('pcode',null,['class'=>'edit-form-control','required','min'=>0,'id'=>'pocode']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Head Branch') !!}
                                {!! Form::checkbox('leadbranch',null,null) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::submit('Create',['class'=>'btn btn-success btn-sm']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <hr>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="listViews">
                            <div id="loading" class="center">
                                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#branch').submit(function (e) {
            e.preventDefault();
            var token = $("input[name='_token']").val();
            var name = $('#name').val();
            var branchlocal = $('#branchlocal').val();
            var shortname = $('#shortname').val();
            var pocode = $('#pocode').val();
            if($('#pocode').val().length<6){
                $.ajax({
                    type : 'post',
                    url  : "{{route('branch.store')}}",
                    data : {
                        _token:token,
                        name:name,
                        branchlocal:branchlocal,
                        shortname:shortname,
                        pocode:pocode
                    },
                    beforeSend:function () {

                    },
                    success:function (data) {
                        $(document).ready(function () {
                            getContent();
                        });
                    }
                });
            }

        });
        $('#pocode').on('keyup',function () {
           if($('#pocode').val().length<6){
               $('#pocode').css('border','');
           }else{
               $('#pocode').css('border','1px solid red');
           }
        });

        $(document).ready(function () {
           getContent();
        });
        function getContent() {
            $.ajax({
                type : 'get',
                url : "{{route('branch.index')}}",
                dataType : 'html',
                beforeSend:function () {

                },success:function (data) {
                     $('#listViews').html(data);
                     $('#branchList').DataTable();
                }, error:function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection