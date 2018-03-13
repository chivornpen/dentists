<div class="modal-dialog modal-sm" role="document">
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