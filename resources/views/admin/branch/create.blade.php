@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Branch
            </div>

            <div class="panel-body">
                <div id="editBranch">
                    {!! Form::open(['method'=>'post','id'=>'branch']) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('name','Branch Name',['class'=>'edit-label']) !!}
                                {!! Form::text('name',null,['class'=>'edit-form-control text-blue','required'=>'true','id'=>'name','placeholder'=>'Branch Name']) !!}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('branchlocal','Branch Local',['class'=>'edit-label']) !!}
                                {!! Form::text('branchlocal',null,['class'=>'edit-form-control text-blue','required','id'=>'branchlocal','placeholder'=>'Branch Local']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('shortname','Short Name',['class'=>'edit-label']) !!}
                                {!! Form::text('shortname',null,['class'=>'edit-form-control text-blue','required','id'=>'shortname','placeholder'=>'Short name branch']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('pcode','Postal Code',['class'=>'edit-label']) !!}
                                {!! Form::number('pcode',null,['class'=>'edit-form-control text-blue','required','min'=>0,'id'=>'pocode','placeholder'=>'Postal Code']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="checkbox checkbox-success">

                                    {!! Form::checkbox('leadbranch',null,null,['id'=>'leadbranch']) !!}
                                    <label for="leadbranch" class="edit-label">
                                        Head Branch
                                    </label>
                                </div>
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
            var data = $('#branch').serialize();
            if($('#pocode').val().length<6){
                $.ajax({
                    type : 'post',
                    url  : "{{route('branch.store')}}",
                    dataType: 'html',
                    data : data,
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
        function turnOn(id) {
            $.ajax({
                type : 'get',
                url : "{{url('/branch/turn/on/')}}"+"/"+id,
                dataType : 'html',
                beforeSend:function () {

                },success:function (data) {
                    getContent();
                }, error:function (error) {
                    console.log(error);
                }
            });
        }
        function turnOff(id) {
            $.ajax({
                type : 'get',
                url : "{{url('/branch/turn/off/')}}"+"/"+id,
                dataType : 'html',
                beforeSend:function () {

                },success:function (data) {
                   getContent();
                }, error:function (error) {
                    console.log(error);
                }
            });
        }
        function editBranch(id) {
            $.ajax({
                type : 'get',
                url : "{{url('branch/edit/branch/')}}"+"/"+id,
                dataType : 'html',
                beforeSend:function () {

                },success:function (data) {
                    $('#editBranch').html(data);
                }, error:function (error) {
                    console.log(error);
                }
            });
        }

        function refresh() {
            window.location.reload();
        }
    </script>
@endsection