@if($pri->count())
    <div class="form-group table-responsive">
        <table id="productList" class="table table-bordered table-striped kh-os">
            <thead>
            <tr>
                <th>No</th>
                <th>ProductName</th>
                <th>FobPrice</th>
                <th>Margin</th>
                <th>LandingPrice</th>
                <th>SellingPreice</th>
                <th>BeginDate</th>
                <th>EndDate</th>
                <th>BranchName</th>
                <th>CreatedBy</th>
                <th style="width:20%; !important;" class="center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            @foreach($pri as $p)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{str_limit($p->product->khName,10)}}</td>
                    <td>{{'$ '.$p->fobPrice}}</td>
                    <td>{{$p->margin . ' %'}}</td>
                    <td>{{'$ '.$p->landingPrice}}</td>
                    <td>{{'$ '.$p->sellingPrice}}</td>
                    <td>{{ Carbon\Carbon::parse($p->beginDate)->format('d-M-Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($p->endDate)->format('d-M-Y') }}</td>
                    <td>{{$p->branch->name}}</td>
                    <td>{{$p->user->name}}</td>
                    <td class="center">
                        <a onclick="editPricelist('{{$p->id}}')"><i class="fa fa-edit icon-edit cursor-pointer"></i></a></a>
                        <a onclick="deletePricelist('{{$p->id}}')"><i class="fa fa-trash icon-delete cursor-pointer"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <h4 class="center text-danger">Record not found!</h4>
@endif