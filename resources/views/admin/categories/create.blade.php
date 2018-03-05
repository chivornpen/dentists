@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading {{\Illuminate\Support\Facades\Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'  }}">
                {{trans('label.category')}}
            </div>
            <div class="panel-body">
                    {!! Form::open(['method'=>'post','id'=>'category']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.language_name')}}</span>
                            {!! Form::select('language_id',$language,null,['class'=>'edit-form-control text-blue height-35','required'=>'true','placeholder'=>trans('label.choose_item')])!!}
                            @if($errors->has('language_id'))
                                <span class="text-danger">
                                    {{$errors->first('language_id')}}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.name')}}</span>
                                {!! Form::text('name',null,['class'=>'edit-form-control text-blue','required'=>'true','placeholder'=>trans('label.name')])!!}
                                @if($errors->has('name'))
                                    <span class="text-danger">
                                            {{$errors->first('name')}}
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="{{\Illuminate\Support\Facades\Lang::locale()=='kh'? 'kh-os' : 'arial'}}">{{trans('label.parent')}}</span>
                                {!! Form::select('parent',$language,null,['class'=>'edit-form-control text-blue height-35','id'=>'code','required'=>'true','placeholder'=>trans('label.choose_item')])!!}
                                @if($errors->has('parent'))
                                    <span class="text-danger">
                                            {{$errors->first('parent')}}
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('label.create'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-success btn-sm':'arial btn btn-success btn-sm']) !!}
                        {!! Form::reset(trans('label.reset'),['class'=>Lang::locale()==='kh' ? 'kh-os btn btn-warning btn-sm':'arial btn btn-warning btn-sm']) !!}
                    </div>
                    {!! Form::close() !!}

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="editlanguage">

                    </div>
                </div>

            </div>
            <div class="panel-footer">
                <div id="viewCategory">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getViewCategory() {
            $.ajax({
                type:'get',
                url:"{{route('category.index')}}",
                dataType:'html',
                success:function (data) {
                    $('#viewCategory').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function () {
            getViewCategory();
        });

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
                        getViewCategory();
                    });
                }
            });
        });

        function updatePos(id) {
            $.ajax({
                type:'get',
                url:"{{url('/language/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#editlanguage').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }

        function deleteLanguage(id) {
            swal({
                title: "{{trans('label.are_you_sure')}}",
                text: "{{trans('label.are_you_sure_delete')}}",
                type: "warning",
                showCancelButton:true,
                closeOnConfirm: false,
                cancelButtonText: "{{trans('label.no')}}",
                confirmButtonText: "{{trans('label.yes')}}",
                confirmButtonColor: "#ec6c62"
            }, function() {
                $.ajax({
                    url : "{{url('/language/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");
                        $(document).ready(function () {
                            getViewLanguage();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }
    </script>
@endsection