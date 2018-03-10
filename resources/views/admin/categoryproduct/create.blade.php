@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class=" panel panel-default">
            <div class="panel-heading {{Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'}}">
                {{trans('label.categoryproduct')}}
            </div>
            <div class="panel-body">
                {!! Form::open(['id'=>'categoryproduct']) !!}
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <span class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.language')}}</span>
                                        {!! Form::select('language_id',$lang,null,['class'=>Lang::locale()==='kh' ?'kh-os edit-form-control height-35 text-blue' : 'arial edit-form-control height-35 text-blue','placeholder'=>trans('label.choose_item'),'required','id'=>'language_id']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <span class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.parent')}}</span>
                                        {!! Form::select('parent_num',$lang,null,['class'=>Lang::locale()==='kh' ?'kh-os edit-form-control height-35 text-blue' : 'arial edit-form-control height-35 text-blue','placeholder'=>trans('label.choose_item')]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <span class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.name')}}</span>
                                        {!! Form::text('name',null,['class'=>Lang::locale()==='kh' ?'kh-os edit-form-control height-35 text-blue' : 'arial edit-form-control height-35 text-blue','placeholder'=>trans('label.fill'),'required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::checkbox('publish',null,null) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::submit(trans('label.create'),['class'=>Lang::locale()==='kh'? 'btn btn-success btn-sm kh-os' : 'btn btn-success btn-sm arial']) !!}
                            {!! Form::reset(trans('label.reset'),['class'=>Lang::locale()==='kh'? 'btn btn-warning btn-sm kh-os' : 'btn btn-warning btn-sm arial']) !!}

                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="panel-footer">
                <div id="viewCreate">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#categoryproduct').submit(function (e) {
           e.preventDefault();
           var data= $('#categoryproduct').serialize();
           $.ajax({
              type  : 'post',
               url  : "{{route('categoryproduct.store')}}",
               data : data,
               dataType : 'json',
               success:function (data) {
                var element;
                $.map(data.language,function (value,key) {
                    element+="<option value='"+key+"'>"+value+"</option>";
                });
                $('#language_id').html(element);
               },
               error:function (error) {
                   console.log(error);
               }
           });
        });
    </script>
@endsection