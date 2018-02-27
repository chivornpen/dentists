@if(count($client))
    <table class="table table-hover" id="listClient">
        <thead>
        <tr>
            <th>No</th>
            <th>Khmer Name</th>
            <th>English Name</th>
            <th>Gender</th>
            <th class="center">Age (Year)</th>
            <th>Date Of Birth</th>
            <th>Cell Phone</th>
            <th>Email</th>
            <th>Occupation</th>
            <th>Current Address</th>
            <th>Branch</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach($client as $c)
            <tr>
                <td>{{$i++}}</td>
                <td class="bokor">{{$c->khname}}</td>
                <td>{{$c->engname}}</td>
                <td>{{$c->gender ==1 ? "Male" : "Female"}}</td>
                <td class="center">{{$c->age}}</td>
                <td>{{\Carbon\Carbon::parse($c->dob)->format('d-M-Y')}}</td>
                <td>{{$c->tel}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->occ}}</td>
                <td>{{$c->addr}}</td>
                <td>{{$c->branch->name}}</td>
                <td>
                    @if($c->active == 1)
                        <a class="pandding-2 cursor-pointer" onclick='turnOff("{{$c->id}}")'><i class="fa fa-toggle-on"></i></a>
                    @else
                        <a class="pandding-2 cursor-pointer" onclick='turnOn("{{$c->id}}")'><i class="fa fa-toggle-off"></i></a>
                    @endif
                    <a class="pandding-2 cursor-pointer" onclick='editClient("{{$c->id}}")'><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
@else
    <div class="center">
        <h5 class="text-danger">No record to views</h5>
    </div>
@endif
