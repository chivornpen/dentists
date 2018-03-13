<<<<<<< HEAD
@if($category->count())
<label class="{{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">{{trans('label.list_view')}}</label>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped table-hover {{Lang::locale()==='kh' ? 'kh-os' : 'arial'}}">
        <thead>
        <tr>
            <th class="center">{{trans('label.No')}}</th>
            <th>{{trans('label.date')}}</th>
            <th>{{trans('label.name')}}</th>
            <th>{{trans('label.parent')}}</th>
            <th class="center">{{trans('label.publish')}}</th>
            <th>{{trans('label.created_by')}}</th>
            <th style="width:20%; !important;" class="center">{{trans('label.action')}}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;?>
        @foreach($category as $c)
            <tr>
                <td class="center">{{$i++}}</td>
                <td>{{$c->date}}</td>
                <td>{{$c->pivot->name}}</td>
                <td>
                    <?php
                    echo \Illuminate\Support\Facades\DB::table('category_language')->select('name')->where('category_id',$c->parent)->where('language_id',$l)->value('name');
                    ?>
                </td>
                <td class="center">{{$c->publish==0 ? trans('label.no') : trans('label.yes') }}</td>
                <td>{{$c->user->name}}</td>
                <td class="center">
                    <a class="cursor-pointer padding-7px"​​ onclick='editCat("{{$c->id}}","{{$c->pivot->language_id}}")' data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit"></i></a>
                    <a href="#" onclick="deleteLanguage('{{$c->id}}')"><i class="fa fa-trash icon-delete"></i></a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    <h4 class="{{Lang::locale()==='kh' ? 'kh-os text-danger' : 'arial text-danger'}}" style="line-height: 50px;text-align: center;">{{trans('label.data_not_found')}}</h4>
=======

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
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
@endif