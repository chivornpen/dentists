<table class="table table-striped table-hover" id="tblPermission">
    <thead>
        <tr>
            <th>No</th>
            <th>Permission Name</th>
            <th>Avalible</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach($per as $p)
        <tr>
            <td>{{$no++}}</td>
            <td>{{strtoupper($p->description)}}</td>
            <td>
                @if($p->isLock==0)
                    <span><i class="fa fa-check"></i></span>
                @else
                    <span><i class="fa fa-exclamation-circle text-danger"></i></span>
                @endif
            </td>
            <td>
                @if($p->isLock==0)
                    <a class="cursor-pointer pandding-2" onclick="turnOn({{$p->id}})"><i class="fa fa-toggle-on aria-hidden="true""></i></a>
                @else
                    <a class="cursor-pointer pandding-2" onclick="turnOff({{$p->id}})"><i class="fa fa-toggle-off aria-hidden="true""></i></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
