@extends('admin.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Suppliers
            </div>
            <div class="panel-body">
                <div id="editSupplier">
                    {!! Form::open(['method'=>'post','id'=>'suppliers']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('companyKhName','&nbsp;Company Khmer Name',['class'=>'edit-label required']) !!}
                                {!! Form::text('companyKhName',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
                                @if($errors->has('companyKhName'))
                                    <span class="text-danger">
                                        {{$errors->first('companyKhName')}}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('companyEnName','&nbsp;Company English Name',['class'=>'edit-label required']) !!}
                                {!! Form::text('companyEnName',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
                                @if($errors->has('companyEnName'))
                                    <span class="text-danger">
                                        {{$errors->first('companyEnName')}}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('zipCode','&nbsp;Zip Code',['class'=>'edit-label']) !!}
                                {!! Form::text('zipCode',null,['class'=>'edit-form-control text-blue'])!!}
                                @if($errors->has('zipCode'))
                                    <span class="text-danger">
                                        {{$errors->first('zipCode')}}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('personalName','&nbsp;Personal Name',['class'=>'edit-label required']) !!}
                                {!! Form::text('personalName',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
                                @if($errors->has('personalName'))
                                    <span class="text-danger">
                                        {{$errors->first('personalName')}}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('email','&nbsp;Email',['class'=>'edit-label required']) !!}
                                {!! Form::email('email',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
                                @if($errors->has('email'))
                                    <span class="text-danger">
                                    {{$errors->first('email')}}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('personalContact','&nbsp;Personal Contact',['class'=>'edit-label required']) !!}
                                {!! Form::text('personalContact',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
                                @if($errors->has('personalContact'))
                                    <span class="text-danger">
                                    {{$errors->first('personalContact')}}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('location','&nbsp;Location',['class'=>'edit-label']) !!}
                                {!! Form::text('location',null,['class'=>'edit-form-control text-blue'])!!}
                                @if($errors->has('location'))
                                    <span class="text-danger">
                                        {{$errors->first('location')}}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('branch_id','&nbsp;Branch Name',['class'=>'edit-label required']) !!}
                                {!! Form::select('branch_id',$branch,null,['class'=>'edit-form-control height-35px text-blue','placeholder'=>'---Please select one---','required'=>true]) !!}
                                @if($errors->has('branch_id'))
                                    <span class="text-danger">
                                    {{$errors->first('branch_id')}}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Create',['class'=>'btn btn-success btn-sm']) !!}
                        {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm']) !!}
                        <a href="{{URL::to('/')}}" class="btn btn-default btn-sm">Close</a>
                    </div>

                </div>
                {!! Form::close() !!}
                </div>
            <div class="container-fluid">
                <div id="tableSuppliers">

                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $('#suppliers').submit(function (e) {
            e.preventDefault();
            var data = $('#suppliers').serialize();
                $.ajax({
                    type : 'post',
                    url  : "{{route('suppliers.store')}}",
                    dataType: 'html',
                    data : data,
                    beforeSend:function () {

                    },
                    success:function (data) {
                        $('#suppliers')[0].reset();
                        $(document).ready(function () {
                            getTableSuppliers();
                        });
                    }
                });

        });
        $(document).ready(function () {
            getTableSuppliers();
        });
        function getTableSuppliers() {
            $.ajax({
                type : 'get',
                url : "{{route('suppliers.index')}}",
                dataType : 'html',
                beforeSend:function () {

                },success:function (data) {
                    $('#tableSuppliers').html(data);
                   $('#suppliersTable').DataTable();
                }, error:function (error) {
                    console.log(error);
                }
            });
        }

        function editSuppliers(id) {
            $.ajax({
                type:'get',
                url:"{{url('/suppliers/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                   $('#editSupplier').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }

        function deleteSuppliers(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this suppliers ?",
                type: "warning",
                showCancelButton:true,
                confirmButtonText: "Yes",
                cancelButtonText : "No",
                cancelButtonColor:"#d33",
                confirmButtonColor: "#dd4b39"
            }, function() {
                $.ajax({
                    url : "{{url('/suppliers/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            getTableSuppliers();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }

        function cancel() {
            window.location.reload();
        }
    </script>
@endsection