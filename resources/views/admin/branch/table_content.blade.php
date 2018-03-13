<div class="table-responsive">
    @if(count($b))
        <table class="table table-hover" id="branchList">
            <thead>
            <tr>
                <th>No</th>
                <th class="center">Branch Code</th>
                <th>Branch Name</th>
                <th>Branch Local</th>
                <th>Short Name</th>
                <th class="center">Head Branch</th>
                <th class="center">Postal Code</th>
                <th class="center">Action</th>

            </tr>
            </thead>
            <tbody>
            @php($i = 1)

            @foreach($b as $br)
                <tr>
                    <td>{{$i++}}</td>
                    <td class="center">{{$br->branchCode}}</td>
                    <td>{{$br->name}}</td>
                    <td>{{$br->branchNameLocal}}</td>
                    <td>{{$br->branchShortName}}</td>
                    <td class="center">
                        @if($br->leadBranch ==1)
                            <i class="fa fa-check text-blue" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                        @endif

                    </td>
                    <td class="center">{{$br->pCode}}</td>
                    <td class="center">
                        @if($br->unused==0)
                            <a class="cursor-pointer pandding-2 " onclick='turnOff("{{$br->id}}")'><i class="fa fa-toggle-on " aria-hidden="true"></i></a>
                            <a class="cursor-pointer pandding-2 icon-edit" onclick='editBranch("{{$br->id}}")'><i class="fa fa-edit " aria-hidden="true"></i></a>
                        @else
                            <a class="cursor-pointer pandding-2" onclick='turnOn("{{$br->id}}")'><i class="fa fa-toggle-off " aria-hidden="true"></i></a>
                            <a class="cursor-pointer pandding-2 icon-edit" onclick='editBranch("{{$br->id}}")'><i class="fa fa-edit " aria-hidden="true"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    @else
        <h5 class="center" style="color: red;">Not found...</h5>
    @endif
</div>

