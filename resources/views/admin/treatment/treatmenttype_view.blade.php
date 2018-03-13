<table class="table table-hover" id="treatmentViewTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Khmer Name</th>
            <th>English Name</th>
            <th class="center">Action</th>
        </tr>
    </thead>
    <tbody>
    @php($i=1)
    @foreach($tre as $r)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$r->khname}}</td>
            <td>{{$r->engname}}</td>
            <td class="center">
                @if($r->active == 1)
                    <a onclick='turnOff("{{$r->id}}")'><i class="fa fa-toggle-on pandding-2 cursor-pointer"></i></a>
                    @else
                    <a onclick='turnOn("{{$r->id}}")'><i class="fa fa-toggle-off pandding-2 cursor-pointer"></i></a>
                @endif
                    <a onclick='editTreatment("{{$r->id}}")'><i class="fa fa-edit pandding-2 cursor-pointer"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>