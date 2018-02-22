<div class="container-fluid">
        <div class="table-responsive">
            <div class="center">
                <img src='{{asset("/photo/$staff->photo")}}' alt=""  style="height: 120px; border-radius: 80px; border: 2px solid #346895; padding: 2px; margin: 0 auto;">
            </div>
            <br>
            <div style="margin: 0 10% 0 10%;">
                <table border="0px" width="100%" class="table table-condensed text-left">
                    <tr>
                        <td>Staff Name</td>
                        <td>{{$staff->name}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{$staff->gender}}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>{{$staff->contact}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$staff->email}}</td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>{{$staff->level}}</td>
                    </tr>
                    <tr>
                        <td>Commission</td>
                        <td>{{$staff->commission}}</td>
                    </tr>
                    <tr>
                        <td>Base Salary</td>
                        <td>{{$staff->baseSalary}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$staff->address}}</td>
                    </tr>
                    <tr>
                        <td>Effect Date</td>
                        <td>{{$staff->effectDate}}</td>
                    </tr>
                    <tr>
                        <td>End Date</td>
                        <td>{{$staff->endDate}}</td>
                    </tr>
                </table>
            </div>
        </div>
</div>