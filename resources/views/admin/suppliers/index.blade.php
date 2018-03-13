@if($suppliers->count())
    <div class="form-group table-responsive">
        <table id="suppliersTable" class="table table-bordered table-striped kh-os">
            <thead>
            <tr>
                <th>No</th>
                <th>KhmerName</th>
                <th>EnglsihName</th>
                <th>PersonalName</th>
                <th>Email</th>
                <th>PersonalContact</th>
                <th>Location</th>
                <th>BranchName</th>
                <th style="width:20%; !important;" class="center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            @foreach($suppliers as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{str_limit($s->companyKhName,10)}}</td>
                    <td>{{str_limit($s->companyEnName,10)}}</td>
                    <td>{{$s->personalName}}</td>
                    <td>{{$s->email}}</td>
                    <td>{{$s->personalContact}}</td>
                    <td>{{$s->location}}</td>
                    <td>{{$s->branch->name}}</td>
                    <td class="center">
                        <a onclick="editSuppliers('{{$s->id}}')"><i class="fa fa-edit icon-edit cursor-pointer"></i></a></a>
                        <a onclick="deleteSuppliers('{{$s->id}}')"><i class="fa fa-trash icon-delete cursor-pointer"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <h4 class="center text-danger">Record not found!</h4>
@endif