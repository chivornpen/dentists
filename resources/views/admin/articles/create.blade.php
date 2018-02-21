@extends('admin.master')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="panel panel-default">
            {!! Form::open(['action'=>'ArticleController@store','method'=>'post']) !!}
            <div class="panel-heading">
                Articles
            </div>
            <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                {!! Form::label('cat','Category Name') !!}
                                {!! Form::select('category_id',$category,null,['class'=>'edit-form-control','placeholder'=>'Please choose category']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                {!! Form::label('tittle','Tittle') !!}
                                {!! Form::text('tittle',null,['class'=>'edit-form-control','placeholder'=>'Please provide tittle']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <textarea id="my-editor" name="content" class="form-control"></textarea>
                            <script src="{{asset('//cdn.tinymce.com/4/tinymce.min.js')}}"></script>
                            <script>
                                var options = {
                                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                                };
                            </script>
                            <script>
                                CKEDITOR.replace('my-editor', options);
                            </script>

                        </div>
                    </div>


            </div>
            <div class="panel-footer">
                {!! Form::submit('Save',['class'=>'btn btn-primary btn-sm']) !!}
                <a href="" class="btn btn-danger btn-sm">Close</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')



@endsection