@if($staff->count())
<div class="table-responsive">
    <table id="staffList" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="center">No</th>
            <th class="center">Photo</th>
            <th>StaffName</th>
            <th class="center">Gender</th>
            <th>Contact</th>
            <th>Email</th>
            <th>BaseSalary</th>
            <th class="center">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php $i=1;?>
            @foreach($staff as $s)
                <td style="line-height: 50px;" class="center">{{$i++}}</td>
                <td class="center"><img src='{{asset("photo/$s->photo")}}' alt="no image" style="background: white;border:2px solid #00A6C7;border-radius: 50px;padding:1px;height: 50px; width: 50px;"></td>
                <td style="line-height: 50px">{{$s->name}}</td>
                <td class="center" style="line-height: 50px">{{$s->gender}}</td>
                <td style="line-height: 50px">{{$s->contact}}</td>
                <td style="line-height: 50px">{{$s->email}}</td>
                <td style="line-height: 50px">{{$s->baseSalary}}</td>
                <td style="line-height: 50px" class="center">
                    <a onclick='editStaff("{{$s->id}}")' title="Edit Staff" class="cursor-pointer fa fa-edit icon-edit"></a>
                    <a onclick='deleteStaff("{{$s->id}}")' title="Delete Staff" class="fa fa-trash cursor-pointer icon-delete"></a>
                    <a onclick='viewStaff("{{$s->id}}")' data-toggle="modal" data-target="#viewStaff" title="View Details" class="cursor-pointer fa fa-eye icon-view"></a>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    <h4>No found record</h4>
@endif