@if($doctor->count())
<div class="table-responsive">
    <table id="doctorList" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="center">No</th>
            <th class="center">Photo</th>
            <th>DoctorName</th>
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
            @foreach($doctor as $d)
                <td style="line-height: 50px;" class="center">{{$i++}}</td>
                <td class="center"><img src='{{asset("photo/$d->photo")}}' alt="no image" style="background: white;border:2px solid #00A6C7;border-radius: 50px;padding:1px;height: 50px; width: 50px;"></td>
                <td style="line-height: 50px">{{$d->name}}</td>
                <td class="center" style="line-height: 50px">{{$d->gender}}</td>
                <td style="line-height: 50px">{{$d->contact}}</td>
                <td style="line-height: 50px">{{$d->email}}</td>
                <td style="line-height: 50px">{{$d->baseSalary}}</td>
                <td style="line-height: 50px" class="center">
                    <a onclick='editDoctor("{{$d->id}}")' title="Edit Doctor" class="cursor-pointer fa fa-edit icon-edit"></a>
                    <a onclick='deleteDoctor("{{$d->id}}")' title="Delete Doctor" class="fa fa-trash cursor-pointer icon-delete"></a>
                    <a onclick='viewDoctor("{{$d->id}}")' data-toggle="modal" data-target="#viewDoctor" title="View Details" class="cursor-pointer fa fa-eye icon-view"></a>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    <h4>No found record</h4>
@endif