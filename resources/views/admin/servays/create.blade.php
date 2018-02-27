@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Servay
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['action'=>'ServayController@store','method'=>'post']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                        <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Servay Name')!!}
                                            {!! Form::text('name',null,['class'=>'edit-form-control'])!!}
                                            @if($errors->has('name'))
                                                <span class="text-danger">
                                                    {{$errors->first('name')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Description')!!}
                                            {!! Form::text('description',null,['class'=>'edit-form-control'])!!}
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
                                    <div class="panel-heading">Servay Views</div>
                                    <div class="panel-body">
                                        @if($servay->count())
                                        <div class="form-group table-responsive">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Servay Name</th>
                                                    <th>Descriotion</th>
                                                    <th>Created By</th>
                                                    <th style="width:20%; !important;" class="center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=1;?>
                                                @foreach($servay as $s)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$s->name}}</td>
                                                        <td>{{$s->description}}</td>
                                                        <td>{{\App\User::where('id',$s->user_id)->value('name')}}</td>
                                                        <td class="center">
                                                            <a href="#" onclick="editServay('{{$s->id}}')" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit icon-edit"></i></a></a>
                                                            <a href="{{url('/servay/delete',[$s->id])}}"><i class="fa fa-trash icon-delete"></i></a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                            <h4>Record not found!</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--End servay Views--}}

                        </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="editServay">

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
        function editServay(id) {
            $.ajax({
                type:'get',
                url:"{{url('/servay/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                   $('#editServay').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection