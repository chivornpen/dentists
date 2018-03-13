<table class="table table-hover" id="treatmentViewTableCurrent">
    <thead>
    <tr>

        <th>No</th>
        <th>Treatment Type</th>
        <th>Khmer Name</th>
        <th>English Name</th>
        <th class="center">Unit Price</th>
        <th class="center">Discount</th>
        <th class="center">Commission</th>
        <th class="center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php($i=1)
    @foreach($t as $r)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$r->treatmenttype->engname}}</td>
            <td>{{$r->khname}}</td>
            <td>{{$r->engname}}</td>
            <td class="center">{{"$ ". $r->unitPrice}}</td>
            <td class="center">{{$r->dis ? $r->dis ." %" : 'N/A'}}</td>
            <td class="center">{{$r->iscommision ? "Yes" : "No"}}</td>
            <td class="center">
                @if($r->active == 1)
                    <a onclick='turnOff("{{$r->id}}")'><i class="fa fa-toggle-on pandding-2 cursor-pointer"></i></a>
                @else
                    <a onclick='turnOn("{{$r->id}}")'><i class="fa fa-toggle-off pandding-2 cursor-pointer"></i></a>
                @endif
                <a href="{{route('treatment.edit',$r->id)}}"><i class="fa fa-edit pandding-2 cursor-pointer"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>