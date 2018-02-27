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
        </tr>
    @endforeach
    </tbody>
</table>