<div class="modal-dialog modal-sm" role="document">
<<<<<<< HEAD
    <div class="modal-content" style="border-radius: 10px;">
        @foreach($data as $d)
            {!! Form::open(['action'=>['CategoryController@update',$d->id],'method'=>'PATCH']) !!}
            <div class="{{Lang::locale()==='kh' ? 'kh-moul modal-header' : 'time-roman modal-header'}}">
                {{trans('label.edit')}}
            </div>
            <div class="container-fluid">
                {!! Form::hidden('pivotId',$d->pivot->id) !!}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <span class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.name')}}</span>
                            {!! Form::text('name',$d->pivot->name,['class'=>Lang::locale()==='kh' ?'kh-os edit-form-control height-35 text-blue' : 'arial edit-form-control height-35 text-blue','placeholder'=>trans('label.fill'),'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <span class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.parent')}}</span>
                            {!! Form::select('parent_num',$parent,$d->parent ? $d->parent : null,['class'=>Lang::locale()==='kh' ?'kh-os edit-form-control height-35 text-blue' : 'arial edit-form-control height-35 text-blue','placeholder'=>trans('label.choose_item'),'id'=>'parent_num']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="checkbox checkbox-primary">
                                {!! Form::checkbox('publishedit',null,$d->publish,['id'=>'publishedit']) !!}
                                <label for="publishedit" class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">
                                    {{trans('label.publish')}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit(trans('label.update'),['class'=>Lang::locale()==='kh'? 'btn btn-success btn-sm kh-os' : 'btn btn-success btn-sm arial']) !!}
                {!! Form::button(trans('label.cancel'),['class'=>Lang::locale()==='kh'? 'btn btn-danger btn-sm kh-os' : 'btn btn-danger btn-sm arial','data-dismiss'=>"modal"]) !!}
            </div>
            {!! Form::close() !!}
        @endforeach
    </div>
</div>
=======
    <div class="panel panel-default">
        <div class="panel-heading">
            Update
        </div>
        {!! Form::model($cat,['action'=>['CategoryController@update',$cat->id],'method'=>'PATCH']) !!}
        <div class="panel-body">
            {!! Form::label('Category Name') !!}
            {!! Form::text('name',null,['class'=>'edit-form-control','required'=>true]) !!}

            {!! Form::label('parent','&nbsp;Parent',['class'=>'edit-label']) !!}
            {!! Form::select('parent',$c,null,['class'=>'edit-form-control height-35px text-blue','placeholder'=>'---Please select one---', 'id'=>'section']) !!}

            {!! Form::label('Description')!!}
            {!! Form::text('description',null,['class'=>'edit-form-control'])!!}

        </div>
        <div class="panel-footer">
            {!! Form::submit('Update',['class'=>'btn btn-primary btn-sm']) !!}
            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
