@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class=" panel panel-default">
            <div class="panel-heading {{Lang::locale()==='kh' ? 'kh-moul' : 'time-roman'}}">
                {{trans('label.categoryproduct')}}
            </div>
            <div class="panel-body">
                {!! Form::open() !!}
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::submit(trans('label.create'),['class'=>Lang::locale()==='kh'? 'btn btn-success btn-sm kh-os' : 'btn btn-success btn-sm arial']) !!}
                            {!! Form::reset(trans('label.reset'),['class'=>Lang::locale()==='kh'? 'btn btn-warning btn-sm kh-os' : 'btn btn-warning btn-sm arial']) !!}

                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection