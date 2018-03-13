<div class="modal-dialog modal-sm" role="document">
    <div class="panel panel-default">
        {!! Form::model($product,['action'=>['ProductController@update',$product->id],'method'=>'PATCH']) !!}
        <div class="panel-body">
            {!! Form::label('khName','&nbsp;Khmer Name',['class'=>'edit-label required']) !!}
            {!! Form::text('khName',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}

            {!! Form::label('enName','&nbsp;English Name',['class'=>'edit-label required']) !!}
            {!! Form::text('enName',null,['class'=>'edit-form-control text-blue','required'=>'true'])!!}

            {!! Form::label('category_id','&nbsp;Category Name',['class'=>'edit-label required']) !!}
            {!! Form::select('category_id',$cat,null,['class'=>'edit-form-control height-35px text-blue','required'=>true,'placeholder'=>'---Please select one---']) !!}

            {!! Form::label('branch_id','&nbsp;Branch Name',['class'=>'edit-label']) !!}
            {!! Form::select('branch_id',$bra,null,['class'=>'edit-form-control height-35px text-blue','placeholder'=>'---Please select one---']) !!}

            {!! Form::submit('Update',['class'=>'btn btn-primary btn-sm']) !!}
            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
        </div>
        {!! Form::close() !!}
    </div>
</div>