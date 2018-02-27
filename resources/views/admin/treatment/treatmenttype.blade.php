@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div id="message"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Treatment Type
            </div>
            <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div id="editTreatment">
                                    {!! Form::open(['id'=>'treatmenttype']) !!}
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
                                            {!! Form::submit('Add',['class'=>'btn btn-success btn-sm']) !!}
                                            <a href="{{route('treatment.create')}}" class="btn btn-danger btn-sm">Cancel</a>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div id="treatmentList" class="table-responsive">

                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function () {
            getViews();
        });
        function getFormCreate() {
            window.location.reload();
        }
        function getViews() {
            $.ajax({
                type : 'get',
                url : "{{url('/treatment/get/view')}}",
                dataType: 'html',
                success:function (data) {
                  $('#treatmentList').html(data);
                  $('#treatmentViewTable').DataTable();
                }
            });
        }

        $('#treatmenttype').submit(function (e) {
           e.preventDefault();
           var data = $('#treatmenttype').serialize();
//            var token = $(this).find("input[name='_token']").val();
//            var engname = $('#engname').val();
//            var khname = $('#khname').val();
           $.ajax({
              type : 'post',
               url : "{{url('/treatment/create/')}}",
               data : data,
               dataType: 'html',
               success:function (data) {
                   getViews();
                   $('#treatmenttype')[0].reset();
                   $('#message').html(data);
                   $('#message').fadeIn('slow');
                   setInterval(function () {
                       $('#message').fadeOut('slow');
                   },5000);
               }
           });
        });

        function turnOff(id) {
            $.ajax({
                type : 'get',
                url : "{{url('/treatment/turn/off')}}"+"/"+id,
                success:function (data) {
                    getViews();
                }
            });
        }

        function turnOn(id) {
            $.ajax({
                type : 'get',
                url : "{{url('/treatment/turn/on')}}"+"/"+id,
                success:function (data) {
                    getViews();
                }
            });
        }

        function editTreatment(id) {
            $.ajax({
                type : 'get',
                url : "{{url('/treatment/turn/edit')}}"+"/"+id,
                success:function (data) {
                   $('#editTreatment').html(data);
                }
            });
        }

    </script>
@endsection