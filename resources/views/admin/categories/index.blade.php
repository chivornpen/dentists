
@if($cat->count())
    <div class="form-group table-responsive">
        <table id="categoryList" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Parent</th>
                <th>Descriotion</th>
                <th>Created By</th>
                <th style="width:20%; !important;" class="center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            @foreach($cat as $c)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{\App\Category::where('id',$c->parent)->value('name')}}</td>
                    <td>{{$c->description}}</td>
                    <td>{{\App\User::where('id',$c->user_id)->value('name')}}</td>
                    <td class="center">
                        <a href="#" onclick="editCategory('{{$c->id}}')" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit icon-edit"></i></a></a>
                        <a href="#" onclick="deleteCategory('{{$c->id}}')"><i class="fa fa-trash icon-delete"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="center text-danger">
        <h4>Record not found!</h4>
    </div>
@endif