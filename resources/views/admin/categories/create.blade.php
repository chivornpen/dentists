@extends('admin.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Category
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['method'=>'post','id'=>'category']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                        <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('name','&nbsp;Category Name',['class'=>'edit-label required']) !!}
                                            {!! Form::text('name',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}
                                            @if($errors->has('name'))
                                                <span class="text-danger">
                                                    {{$errors->first('name')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('parent','&nbsp;Parent',['class'=>'edit-label']) !!}
                                            {!! Form::select('parent',$cat,null,['class'=>'edit-form-control height-35px text-blue','placeholder'=>'---Please select one---', 'id'=>'section']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Description')!!}
                                            {!! Form::text('description',null,['class'=>'edit-form-control text-blue'])!!}
                                            @if($errors->has('description'))
                                                <span class="text-danger">
                                                    {{$errors->first('description')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            <div class="form-group">
                                {!! Form::submit('Create',['class'=>'btn btn-success btn-sm']) !!}
                                {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm']) !!}
                            </div>

                        </div>
                    {!! Form::close() !!}
                        <div class="col-md-8">
                            {{--servay Views--}}
                            <div class="container-fluid">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Category Views</div>
                                    <div class="panel-body">
                                        <div id="tableCategory">

                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--End servay Views--}}

                        </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="editCategory">

                    </div>
                </div>

            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $('#category').submit(function (e) {
            e.preventDefault();
            var data = $('#category').serialize();
                $.ajax({
                    type : 'post',
                    url  : "{{route('category.store')}}",
                    dataType: 'html',
                    data : data,
                    beforeSend:function () {

                    },
                    success:function (data) {
                        $('#category')[0].reset();
                        $(document).ready(function () {
                            getTableCategory();
                            getSelectParent();
                        });
                    }
                });

        });
        $(document).ready(function () {
            getTableCategory();
        });
        function getTableCategory() {
            $.ajax({
                type : 'get',
                url : "{{route('category.index')}}",
                dataType : 'html',
                beforeSend:function () {

                },success:function (data) {
                    $('#tableCategory').html(data);
                    //$('#categoryList').DataTable();
                }, error:function (error) {
                    console.log(error);
                }
            });
        }

        function editCategory(id) {
            $.ajax({
                type:'get',
                url:"{{url('/category/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                   $('#editCategory').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }

        function deleteCategory(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this category ?",
                type: "warning",
                showCancelButton:true,
                confirmButtonText: "Yes",
                cancelButtonText : "No",
                cancelButtonColor:"#d33",
                confirmButtonColor: "#dd4b39"
            }, function() {
                $.ajax({
                    url : "{{url('/category/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            getTableCategory();
                            getSelectParent();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }

        function getSelectParent() {
            $.ajax({
                type: 'get',
                url: "{{url('/get/select/parent')}}",
                dataType: 'json',
                success: function (response) {
                    if(Array.isArray(response)){
                        $(section).empty();
                        var serialnumber="<option value=''>---Please select one---</option>";
                        $(section).append(serialnumber);
                        response.map(function(item){
                            serialnumber="<option value=" + item.id + ">" + item.name + "</option>";
                            $(section).append(serialnumber);
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection